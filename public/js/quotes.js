const refreshButton = document.getElementById('refresh-button');
const quoteContainer = document.getElementById('quote-container');
const loadingContainer = document.getElementById('loading-container');

async function fetchQuotes() {
    const loading = document.createElement('div');
    loading.className = 'w-full text-center bg-white px-4 py-2';
    const loadingText = document.createElement('span');
    loadingText.textContent = 'Loading...';
    loading.appendChild(loadingText);
    loadingContainer.appendChild(loading);

    try {
        const response = await fetch('/api/v1/quotes');
        const dataObj = await response.json();
        const quotesArray = dataObj.data;
        if (Array.isArray(quotesArray)) {
            quoteContainer.innerHTML = '';
            quotesArray.forEach((quote) => {
                const quoteElement = document.createElement('div');
                quoteElement.className = 'mb-4 bg-gray-100 rounded-lg p-8';
                quoteElement.innerHTML = `
                    <p class="mb-2 text-sm text-gray-600 text-left">Kanye West once said -</p>
                    <p class="mb-2 mb-4"><b>"${quote.quote}"</b></p>
                    <span class="copy-svg cursor-pointer">
                        ${getCopyIconHtml()}
                    </span>
                `;
                quoteContainer.appendChild(quoteElement);

                const copyIcon = quoteElement.querySelector('.copy-svg');
                copyIcon.addEventListener('click', (event) => {
                    copyQuote(event, quote.quote);
                });
            });
        } else {
            console.error(dataObj);
        }
    } catch (error) {
        console.error(error);
    } finally {
        loading.remove();
    }
}

async function copyQuote(event, quote) {
    await navigator.clipboard.writeText(quote);
    const tooltip = document.createElement('span');
    tooltip.className = 'text-gray-600 text-sm ml-1';
    tooltip.textContent = 'Copied!';
    event.target.parentNode.appendChild(tooltip);
    setTimeout(() => {
        tooltip.remove();
    }, 1000);
}

function getCopyIconHtml() {
    return `
        <svg fill="#000000" height="16px" width="16px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 352.804 352.804" xml:space="preserve">
            <g id="SVGRepo_bgCarrier" stroke-width="0" class="text-right"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <g>
                    <path d="M318.54,57.282h-47.652V15c0-8.284-6.716-15-15-15H34.264c-8.284,0-15,6.716-15,15v265.522c0,8.284,6.716,15,15,15h47.651 v42.281c0,8.284,6.716,15,15,15H318.54c8.284,0,15-6.716,15-15V72.282C333.54,63.998,326.824,57.282,318.54,57.282z M49.264,265.522V30h191.623v27.282H96.916c-8.284,0-15,6.716-15,15v193.24H49.264z M303.54,322.804H111.916V87.282H303.54V322.804 z"></path>
                </g>
            </g>
        </svg>
    `;
}

fetchQuotes().catch((error) => {
    console.error(error);
});

refreshButton.addEventListener('click', fetchQuotes);
