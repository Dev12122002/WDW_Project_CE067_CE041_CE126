const url = localStorage.getItem("storageName");


// If absolute URL from the remote server is provided, configure the CORS
// header on that server.
//var url = '//raw.githubusercontent.com/mozilla/pdf.js/ba2edeae/web/compressed.tracemonkey-pldi-09.pdf';

// Loaded via <script> tag, create shortcut to access PDF.js exports.
var pdfjsLib = window['pdfjs-dist/build/pdf'];

// The workerSrc property shall be specified.
pdfjsLib.GlobalWorkerOptions.workerSrc = '//mozilla.github.io/pdf.js/build/pdf.worker.js';

var pdfDoc = null,
    pageNum = 1,
    pageRendering = false,
    pageNumPending = null,
    //scale = 0.8,
    scale = 1.5,
    canvas = document.getElementById('the-canvas'),
    ctx = canvas.getContext('2d');

/**
 * Get page info from document, resize canvas accordingly, and render page.
 * @param num Page number.
 */
function renderPage(num) {
  pageRendering = true;
  // Using promise to fetch the page
  pdfDoc.getPage(num).then(function(page) {
    var viewport = page.getViewport({scale: scale});
    canvas.height = viewport.height;
    canvas.width = viewport.width;

    // Render PDF page into canvas context
    var renderContext = {
      canvasContext: ctx,
      viewport: viewport
    };
    var renderTask = page.render(renderContext);

    // Wait for rendering to finish
    renderTask.promise.then(function() {
      pageRendering = false;
      if (pageNumPending !== null) {
        // New page rendering is pending
        renderPage(pageNumPending);
        pageNumPending = null;
      }
    }).then(function() {
      // Returns a promise, on resolving it will return text contents of the page
      return page.getTextContent();
    }).then(function(textContent) {

      // Assign CSS to the textLayer element
      var textLayer = document.querySelector(".textLayer");

      textLayer.style.left = canvas.offsetLeft + 'px';
      textLayer.style.top = canvas.offsetTop + 'px';
      textLayer.style.height = canvas.offsetHeight + 'px';
      textLayer.style.width = canvas.offsetWidth + 'px';

      // Pass the data to the method for rendering of text over the pdf canvas.
      pdfjsLib.renderTextLayer({
        textContent: textContent,
        container: textLayer,
        viewport: viewport,
        textDivs: []
      });
    });
  });

  // Update page counters
  document.getElementById('page_num').textContent = num;
}

/**
 * If another page rendering in progress, waits until the rendering is
 * finised. Otherwise, executes rendering immediately.
 */
function queueRenderPage(num) {
  if (pageRendering) {
    pageNumPending = num;
  } else {
    renderPage(num);
  }
}

/**
 * Displays previous page.
 */
function onPrevPage() {
  if (pageNum <= 1) {
    return;
  }
  pageNum--;
  queueRenderPage(pageNum);
}
document.getElementById('prev').addEventListener('click', onPrevPage);

/**
 * Displays next page.
 */
function onNextPage() {
  if (pageNum >= pdfDoc.numPages) {
    return;
  }
  pageNum++;
  queueRenderPage(pageNum);
}
document.getElementById('next').addEventListener('click', onNextPage);


function goToPageNum(ev) {
  let numberInput = document.getElementById('page_num2');
  let pageNumber = parseInt(numberInput.value);
  if(pageNumber) {
      if(pageNumber <= pdfDoc.numPages && pageNumber >= 1){
          currentPageNum = pageNumber;
          numberInput.value ="";
          queueRenderPage(pageNumber);
          return ;
      }
  }
      alert("Enter a valid page number");
}
document.querySelector('#go_to_page').addEventListener('click', goToPageNum);
/**
 * Asynchronously downloads PDF.
 */
pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
  pdfDoc = pdfDoc_;
  document.getElementById('page_count').textContent = pdfDoc.numPages;

  // Initial/first page rendering
  renderPage(pageNum);
});






/*PDFJS.getDocument(url)
.then(function(pdf) {

  // Get div#container and cache it for later use
  var container = document.getElementById("container2");

  // Loop from 1 to total_number_of_pages in PDF document
  for (var i = 1; i <= pdf.numPages; i++) {

      // Get desired page
      pdf.getPage(i).then(function(page) {

        var scale = 1.5;
        var viewport = page.getViewport(scale);
        var div = document.createElement("div");

        // Set id attribute with page-#{pdf_page_number} format
        div.setAttribute("id", "page-" + (page.pageIndex + 1));

        // This will keep positions of child elements as per our needs
        div.setAttribute("style", "position: relative");

        // Append div within div#container
        container.appendChild(div);

        // Create a new Canvas element
        var canvas = document.createElement("canvas");

        // Append Canvas within div#page-#{pdf_page_number}
        div.appendChild(canvas);

        var context = canvas.getContext('2d');
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        var renderContext = {
          canvasContext: context,
          viewport: viewport
        };

        // Render PDF page
        page.render(renderContext)
  .then(function() {
    // Get text-fragments
    return page.getTextContent();
  })
  .then(function(textContent) {
    // Create div which will hold text-fragments
    var textLayerDiv = document.createElement("div");

    // Set it's class to textLayer which have required CSS styles
    textLayerDiv.setAttribute("class", "textLayer");

    // Append newly created div in `div#page-#{pdf_page_number}`
    div.appendChild(textLayerDiv);

    // Create new instance of TextLayerBuilder class
    var textLayer = new TextLayerBuilder({
      textLayerDiv: textLayerDiv, 
      pageIndex: page.pageIndex,
      viewport: viewport
    });

    // Set text-fragments
    textLayer.setTextContent(textContent);

    // Render text-fragments
    textLayer.render();
  });
      });
  }
});*/







// Brad javascript




/*
let pdfDoc = null,
  pageNum = 1,
  pageIsRendering = false,
  pageNumIsPending = null;

const scale = 1.5,
  canvas = document.querySelector('#pdf-render'),
  ctx = canvas.getContext('2d');

// Render the page
const renderPage = num => {
  pageIsRendering = true;

  // Get page
  pdfDoc.getPage(num).then(page => {
    // Set scale
    const viewport = page.getViewport({ scale });
    canvas.height = viewport.height;
    canvas.width = viewport.width;

    const renderCtx = {
      canvasContext: ctx,
      viewport
    };

    page.render(renderCtx).promise.then(() => {
      pageIsRendering = false;

      if (pageNumIsPending !== null) {
        renderPage(pageNumIsPending);
        pageNumIsPending = null;
      }

           
    }); 

    document.querySelector('#page-num').textContent = num;
    }); 

    
     
    // Output current page
    
    
  
};

// Check for pages rendering
const queueRenderPage = num => {
  if (pageIsRendering) {
    pageNumIsPending = num;
  } else {
    renderPage(num);
  }
};

// Show Prev Page
const showPrevPage = () => {
  if (pageNum <= 1) {
    return;
  }
  pageNum--;
  queueRenderPage(pageNum);
};

// Show Next Page
const showNextPage = () => {
  if (pageNum >= pdfDoc.numPages) {
    return;
  }
  pageNum++;
  queueRenderPage(pageNum);
};

function goToPageNum(ev) {
    let numberInput = document.getElementById('page_num');
    let pageNumber = parseInt(numberInput.value);
    if(pageNumber) {
        if(pageNumber <= pdfDoc.numPages && pageNumber >= 1){
            currentPageNum = pageNumber;
            numberInput.value ="";
            queueRenderPage(pageNumber);
            return ;
        }
    }
        alert("Enter a valid page number");
}

// Get Document
pdfjsLib
  .getDocument(url)
  .promise.then(pdfDoc_ => {
    pdfDoc = pdfDoc_;

    document.querySelector('#page-count').textContent = pdfDoc.numPages;

    renderPage(pageNum);
  })
  .catch(err => {
    // Display error
    const div = document.createElement('div');
    div.className = 'error';
    div.appendChild(document.createTextNode(err.message));
    document.querySelector('body').insertBefore(div, canvas);
    // Remove top bar
    document.querySelector('.top-bar').style.display = 'none';
  });

// Button Events
document.querySelector('#prev-page').addEventListener('click', showPrevPage);
document.querySelector('#next-page').addEventListener('click', showNextPage);
document.querySelector('#go_to_page').addEventListener('click', goToPageNum);*/







// page is the page context of the PDF page
// viewport is the viewport required in renderContext
// For more see https://usefulangle.com/post/20/pdfjs-tutorial-1-preview-pdf-during-upload-wih-next-prev-buttons    


// Speech Synthesis



// Initialize new SpeechSynthesisUtterance object
let speech = new SpeechSynthesisUtterance();

// Set Speech Language
speech.lang = "en";

let voices = []; // global array of available voices

window.speechSynthesis.onvoiceschanged = () => {
  // Get List of Voices
  voices = window.speechSynthesis.getVoices();

  // Initially set the First Voice in the Array.
  speech.voice = voices[0];

  // Set the Voice Select List. (Set the Index as the value, which we'll use later when the user updates the Voice using the Select Menu.)
  let voiceSelect = document.querySelector("#voices");
  voices.forEach((voice, i) => (voiceSelect.options[i] = new Option(voice.name, i)));
};

document.querySelector("#rate").addEventListener("input", () => {
  // Get rate Value from the input
  const rate = document.querySelector("#rate").value;

  // Set rate property of the SpeechSynthesisUtterance instance
  speech.rate = rate;

  // Update the rate label
  document.querySelector("#rate-label").innerHTML = rate;
});

document.querySelector("#volume").addEventListener("input", () => {
  // Get volume Value from the input
  const volume = document.querySelector("#volume").value;

  // Set volume property of the SpeechSynthesisUtterance instance
  speech.volume = volume;

  // Update the volume label
  document.querySelector("#volume-label").innerHTML = volume;
});

document.querySelector("#pitch").addEventListener("input", () => {
  // Get pitch Value from the input
  const pitch = document.querySelector("#pitch").value;

  // Set pitch property of the SpeechSynthesisUtterance instance
  speech.pitch = pitch;

  // Update the pitch label
  document.querySelector("#pitch-label").innerHTML = pitch;
});

document.querySelector("#voices").addEventListener("change", () => {
  // On Voice change, use the value of the select menu (which is the index of the voice in the global voice array)
  speech.voice = voices[document.querySelector("#voices").value];
});

document.querySelector("#start").addEventListener("click", () => {
  // Set the text property with the value of the textarea
  speech.text = document.querySelector("textarea").value;

  // Start Speaking
  window.speechSynthesis.speak(speech);
});

document.querySelector("#pause").addEventListener("click", () => {
  // Pause the speechSynthesis instance
  window.speechSynthesis.pause();
});

document.querySelector("#resume").addEventListener("click", () => {
  // Resume the paused speechSynthesis instance
  window.speechSynthesis.resume();
});

document.querySelector("#cancel").addEventListener("click", () => {
  // Cancel the speechSynthesis instance
  window.speechSynthesis.cancel();
});




// Select text from pdf

// addEventListener version

document.ondblclick = () => {
  // onselectionchange version
 // document.onselectionchange = () => {
    var text = getSelectedText();

    if(text)
    {
      document.querySelector('textarea').value = text;

    }
  //};

  function getSelectedText() {
     if (window.getSelection) {
        return window.getSelection().toString();
     } 
     else if (document.selection) {
         return document.selection.createRange().text;
     }
     return '';
  } 
};
document.onmouseup = () => {
  // onselectionchange version
 // document.onselectionchange = () => {
    var text = getSelectedText();

    if(text)
    {
      document.querySelector('textarea').value = text;
    }
  //};

  function getSelectedText() {
     if (window.getSelection) {
        return window.getSelection().toString();
     } 
     else if (document.selection) {
         return document.selection.createRange().text;
     }
     return '';
  } 
};
 /* document.addEventListener("dblclick", function(){

    console.log("works");
    var data = getHightlightCoords();
    console.log(data);
    showHighlight(data);

  });

  function getHightlightCoords() {
    var pageIndex = pageNum - 1; 
    var page = getPageView(pageIndex);
    var pageRect = page.canvas.getClientRects()[0];
    var selectionRects = window.getSelection().getRangeAt(0).getClientRects();
    var viewport = page.viewport;
    var selected = selectionRects.map(function (r) {
      return viewport.convertToPdfPoint(r.left - pageRect.x, r.top - pageRect.y).concat(
         viewport.convertToPdfPoint(r.right - pageRect.x, r.bottom - pageRect.y)); 
    });
    return {page: pageIndex, coords: selected};
    }
    
    
    function showHighlight(selected) {
    var pageIndex = selected.page; 
    var page = getPageView(pageIndex);
    var pageElement = page.canvas.parentElement;
    var viewport = page.viewport;
    selected.coords.forEach(function (rect) {
      var bounds = viewport.convertToViewportRectangle(rect);
      var el = document.createElement('div');
      el.setAttribute('style', 'position: absolute; background-color: pink;' + 
        'left:' + Math.min(bounds[0], bounds[2]) + 'px; top:' + Math.min(bounds[1], bounds[3]) + 'px;' +
        'width:' + Math.abs(bounds[0] - bounds[2]) + 'px; height:' + Math.abs(bounds[1] - bounds[3]) + 'px;');
      pageElement.appendChild(el);
    });
    } */



     // $('#load_pdf').on('show.bs.modal', function () {
  /*  $('document').ready(function(){

        const PDFStart = nameRoute => {
            let loadingTask = pdfjsLib.getDocument(nameRoute),
            pdfDoc = null,
            canvas = document.querySelector('#cnv'),
            ctx = canvas.getContext('2d'),
            scale = 1.5,
            numPage = 1;
            loadingTask.promise.then(pdfDoc_ => {
                pdfDoc = pdfDoc_;
                document.querySelector('#npages').innerHTML = pdfDoc.numPages;
                GeneratePDF(numPage)
            });
        
            const GeneratePDF = numPage => {
                pdfDoc.getPage(numPage).then(page => {
                let viewport = page.getViewport({ scale: scale });
                canvas.height = viewport.height;
                canvas.width = viewport.width;
                let renderContext = {
                canvasContext : ctx,
                viewport:  viewport
                }
                page.render(renderContext);
                })
                document.querySelector('#npages').innerHTML = numPage;
            }
        
            document.querySelector('#prev').addEventListener('click', PrevPage)
            document.querySelector('#next').addEventListener('click', NextPage)
        
            const PrevPage = () => {
                if(numPage === 1){
                return
                }
                numPage--;
                GeneratePDF(numPage);
            }
        
            const NextPage = () => {
                if(numPage >= pdfDoc.numPages){
                return
                }
                numPage++;
                GeneratePDF(numPage);
            }
                
        
        }
       // var link = $('load_pdfdata').getAttribute("href");
     // var href = localStorage.getItem("storageName")
     //  console.log(href);
     var href = "pdfupload/776e65c83991f7204bf5196cc37b60407ab195b5.pdf";
       const startPdf = () => {
        PDFStart(href);
        };
        
        window.addEventListener('load', startPdf);
        
    }); */


    // Another Javascript

/*    
let pdf ;
let canvas;
let isPageRendering;
let  pageRenderingQueue = null;
let canvasContext;
let totalPages;
let currentPageNum = 1;

// events
window.addEventListener('load', function () {
    isPageRendering= false;
    pageRenderingQueue = null;
    canvas = document.getElementById('pdf_canvas');
    canvasContext = canvas.getContext('2d');
    
    initEvents();
    initPDFRenderer();
});

function initEvents() {
    let prevPageBtn = document.getElementById('prev_page');
    let nextPageBtn = document.getElementById('next_page');
    let goToPage = document.getElementById('go_to_page');
    prevPageBtn.addEventListener('click', renderPreviousPage);
    nextPageBtn.addEventListener('click',renderNextPage);
    goToPage.addEventListener('click', goToPageNum);
}

// init when window is loaded
function initPDFRenderer() {
    const url =  localStorage.getItem("storageName"); // replace with your pdf location
    // const cMapUrl = '/cmaps/';
    // const cMapPacked = true;
    let option  = { url};
    

    pdfjsLib.getDocument(option).promise.then(pdfData => {
        totalPages = pdfData.numPages;
        let pagesCounter= document.getElementById('total_page_num');
        pagesCounter.textContent = totalPages;

        // assigning read pdfContent to global variable
        pdf = pdfData;
        console.log(pdfData);
        renderPage(currentPageNum);
    });
}

function renderPage(pageNumToRender = 1, scale = 1) {
    isPageRendering = true;
    document.getElementById('current_page_num').textContent = pageNumToRender;
    pdf.getPage(pageNumToRender).then(page => {
        const viewport = page.getViewport({scale :1});
        canvas.height = viewport.height;
        canvas.width = viewport.width;  
        let renderCtx = {canvasContext ,viewport};
        page.render(renderCtx).promise.then(()=> {
            isPageRendering = false;
            if(pageRenderingQueue !== null) { // this is to check of there is next page to be rendered in the queue
                renderPage(pageNumToRender);
                pageRenderingQueue = null; 
            }
        });        
    }); 
}

function renderPageQueue(pageNum) {
    if(pageRenderingQueue != null) {
        pageRenderingQueue = pageNum;
    } else {
        renderPage(pageNum);
    }
}

function renderNextPage(ev) {
    if(currentPageNum >= totalPages) {
        alert("This is the last page");
        return ;
    } 
    currentPageNum++;
    renderPageQueue(currentPageNum);
}

function renderPreviousPage(ev) {
    if(currentPageNum<=1) {
        alert("This is the first page");
        return ;
    }
    currentPageNum--;
    renderPageQueue(currentPageNum);
}

function goToPageNum(ev) {
    let numberInput = document.getElementById('page_num');
    let pageNumber = parseInt(numberInput.value);
    if(pageNumber) {
        if(pageNumber <= totalPages && pageNumber >= 1){
            currentPageNum = pageNumber;
            numberInput.value ="";
            renderPageQueue(pageNumber);
            return ;
        }
    }
        alert("Enter a valide page numer");
} */






      
    

