window.addEventListener('DOMContentLoaded',function(){
  document.querySelectorAll('.removeLink').forEach(function(el){
    el.addEventListener('click',function(){removeLink(el)});
  });
});

function removeLink(el){
  let div = el.parentNode;
  console.log(div);
  div.parentNode.removeChild(div);
}

function addLink(){
  console.log('addLink');
  let newLink = document.getElementById('linkTemplate').cloneNode(true);
  newLink.querySelector('.removeLink').addEventListener('click',function(){removeLink(this)});
  newLink.classList.remove('hidden');
  newLink.id = '';
  document.getElementById('links').appendChild(newLink);
}
