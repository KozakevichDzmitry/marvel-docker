document.addEventListener("DOMContentLoaded", () => {
    const menu =document.querySelector('.header')
    const btn = document.querySelector('.menu-toggle')
    const nav = document.querySelector('.main-navigation')
    const setHeight = (nav) =>{
        const distanceScrolled = document.body.scrollTop;
        const elemRect = nav.getBoundingClientRect();
        const elemViewportOffset = elemRect.top;
        const totalOffset = distanceScrolled + elemViewportOffset;
        const height = document.documentElement.clientHeight - totalOffset
        const css = `height: ${height}px;`
        nav. setAttribute("style", css);
    }
    btn.addEventListener('click',e =>{
        const oldClassList = e.currentTarget.getAttribute('class')
        menu.classList.toggle('active')
        btn.classList.toggle('active')
        if(oldClassList.match(/active/)){
            document.querySelector('body').removeAttribute("style")
            nav.removeAttribute("style")
        }else{
            const css = 'position: fixed; overflow-y:scroll'
            document.querySelector('body'). setAttribute("style", css);
            setHeight(nav)
        }
    })

})

document.addEventListener("DOMContentLoaded", () => {

})