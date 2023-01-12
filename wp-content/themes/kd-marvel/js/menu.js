document.addEventListener("DOMContentLoaded", () => {
    const menu =document.querySelector('.header')
    const btn = document.querySelector('.menu-toggle')
    const btnContactMobile = document.querySelector('#btnContactMobile')
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
    const openMenu =()=>{
        const css = 'position: fixed; overflow-y:scroll'
        menu.classList.add('active')
        btn.classList.add('active')
        document.querySelector('body'). setAttribute("style", css);
        setHeight(nav)
    }
    const closeMenu =()=>{
        menu.classList.remove('active')
        btn.classList.remove('active')
        document.querySelector('body').removeAttribute("style")
        nav.removeAttribute("style")
    }
    btn.addEventListener('click',e => {
        const oldClassList = e.currentTarget.getAttribute('class')
        if(oldClassList.match(/active/)){
            closeMenu()
        } else{
            openMenu()
        }
    })
    btnContactMobile.addEventListener('click',closeMenu)

    const mediaQuery = window.matchMedia('(max-width: 600px)')
    const handleTabletChange= e =>{
        if (!e.matches) {
            closeMenu()
        }
    }
    mediaQuery.addEventListener('change', handleTabletChange)
    handleTabletChange(mediaQuery)
})

