window.onload = () => {
    const body = document.querySelector('body')
    const sections = document.querySelectorAll('[data-block="indicate"]')
    let blockIndicate = document.createElement('div')
    blockIndicate.classList.add('indicate__section')
    const addBlockIndicateItems = (title, num, id, blockIndicate) => {
        let item = document.createElement('div')
        item.classList.add('indicate__item')
        item.setAttribute("data-id", `${id}`);
        item.innerHTML = `<span class="inactive__num" >${num}</span>
                        <span class="inactive__title">${title}</span>`

        blockIndicate.appendChild(item)
    }
    sections.forEach((elem, i) => {
        const title = elem.dataset.blockTitle
        const num = (num) => {
            let str = String(num+1)
            return str.length > 1 ? str : 0 + str
        }
        addBlockIndicateItems(title, num(i), elem.id, blockIndicate)
    })
    document.documentElement.style.setProperty('--indicate-color', `#000000`) //default color
    body.appendChild(blockIndicate)

    const observer = new IntersectionObserver((entries, observer)=>{
        entries.forEach(entry => {
            const id = entry.target.id
            const blockIndicate = document.querySelector(`[data-id= ${id}]`)
            if(entry.isIntersecting){
                const color = entry.target.dataset.indicateColor
                blockIndicate.classList.add('active')
                document.documentElement.style.setProperty('--indicate-color', color)
            }else{
                blockIndicate.classList.remove('active')
            }

        })
    }, {threshold: .5});

    sections.forEach( section =>{
        observer.observe(section)
    })

}