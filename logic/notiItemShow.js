
Array.from(document.querySelectorAll('.notification-list_detail')).forEach(item=>
    {
         item.onclick =function()
         {
             item.parentElement.parentElement.classList.toggle("see-more");
         }
    })
    Array.from(document.querySelectorAll('.event_image')).forEach(item=>    
    {
     item.onclick = function()
     {
        img = document.createElement('img');
        img.setAttribute('src', item.src);
        img. classList.add('detail-img');
         document.querySelector('.overlay-wrapper').appendChild(img);
         document.querySelector('.overlay-wrapper').style.display = "block";
         document.querySelector('.overlay-wrapper .record-container').style.display='none';
     }
    })
    document.querySelector('.overlay').onclick =function()
    {
         document.querySelector('.overlay-wrapper').style.display = "none";
    }
    Array.from(document.querySelectorAll('.notification-list')).forEach(item=>
        {
            const acceptBtn = item.querySelector('.execute-status .accept');
            const denyBtn =  item.querySelector('.execute-status .deny');
            const receivedBtn = item.querySelector('.receive-btn');
            const executeStatus  = item.querySelector('.execute-status');
            if(receivedBtn)
            {
                receivedBtn.onclick = ()=>{
                    receivedBtn.classList.add('hidden');
                    executeStatus.classList.add('show');
                }
            }
            if(acceptBtn)
                if(denyBtn)
                    acceptBtn.onclick = ()=>denyBtn.style.display = 'none';
            if(denyBtn)
                if(acceptBtn)
                denyBtn.onclick = ()=>acceptBtn.style.display = 'none';
        });
        if(document.querySelector('.new-record'))
        {
            document.querySelector('.new-record').onclick =  ()=>
            {
                document.querySelector('.overlay-wrapper').style.display = "block";
                document.querySelector('.overlay-wrapper .record-container').style.display = "flex";
                document.querySelector('.overlay-wrapper img').remove();
            }
        }
       
// console.log(document.querySelector('.text-center input[name="load-more"]'));
// document.querySelector('.text-center input[name="load-more"]').value = document.querySelector('.notification-ui_dd-content input[name="category"]').value;
// console.log(document.querySelector('.text-center input[name="load-more"]').value);
