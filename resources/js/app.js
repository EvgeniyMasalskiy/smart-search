const { set } = require('lodash');

require('./bootstrap');

myWebResultsRenderedCallback = function (name, q, promos, results) {
  id = 0;

  for (const div of promos.concat(results)) {

    const innerDiv = document.createElement('div');
    innerDiv.appendChild(document.createTextNode('Сохранить '));

    button = document.createElement('button');
    button.setAttribute('class', 'btn btn-outline-success');
    button.setAttribute('id', 'but' + id);
    button.setAttribute('data-bs-toggle', 'modal');
    button.setAttribute('data-bs-target', '#exampleModal2');

    button.setAttribute('onclick', 'saveRes(' + id + ')');

    innerDiv.appendChild(button);
    div.children[0].setAttribute('id', 'div' + id);
    id += 1;
    //.children[0].children[0].children[0].href

    div.insertAdjacentElement('afterbegin', innerDiv);
  }
};


window.__gcse || (window.__gcse = {});
window.__gcse.searchCallbacks = {
  web: {
    rendered: 'myWebResultsRenderedCallback',
  },
};
chrome.runtime.onMessage.addListener((request, sender, sendResponse) => {
  // ... handle message
  return true // Error message says you already return true
});




