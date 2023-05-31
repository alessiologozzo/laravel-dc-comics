import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
]);

// import "./js/menu.js";
// require ('./menu.js');

window.alVar = {
    comicIndex: null
}

window.alFunc = {

    showMenu(e){
        let menu = e.currentTarget.querySelector(".al-menu");
        let menuData = e.currentTarget.closest(".al-menu-data");
        let height = menuData.offsetHeight;
    
        menu.classList.toggle("al-menu-visible");
        menu.style.top = `${height}px`;
    },
    
    removeMenusHandler(e){
        let menus = document.getElementsByClassName("al-menu");
    
        if(e.target.parentElement == null)
            return;
    
        if(!e.target.parentElement.classList.contains("al-menu-data")){
            for(let i = 0; i < menus.length; i++)
                menus[i].classList.remove("al-menu-visible");
    
            return;
        }
    
        let menu = e.target.parentElement.querySelector(".al-menu");
        for(let i = 0; i < menus.length; i++)
            if(menus[i].offsetParent != menu.offsetParent)
                menus[i].classList.remove("al-menu-visible");
    },
    
    showContextMenu(e){

        this.removeContextMenus();
        let contextMenuData = e.target.closest(".al-context-menu-data");

        if(contextMenuData == null)
            return;

        let contextMenuDim = contextMenuData.querySelector(".al-context-menu-dim");
        let contextMenuLeft = contextMenuDim.getBoundingClientRect().x;
        let contextMenuTop = contextMenuDim.getBoundingClientRect().y;
        let contextMenuRight = contextMenuDim.getBoundingClientRect().x + contextMenuDim.getBoundingClientRect().width;
        let contextMenuBottom = contextMenuDim.getBoundingClientRect().y + contextMenuDim.getBoundingClientRect().height;

        if((e.clientX < contextMenuLeft || e.clientX > contextMenuRight) || (e.clientY < contextMenuTop || e.clientY > contextMenuBottom))
            return;

        let contextMenu = contextMenuData.querySelector(".al-context-menu");
        contextMenu.classList.add("al-menu-visible");
        contextMenu.style.left = `${e.clientX}px`;
        contextMenu.style.top = `${e.clientY}px`;

        this.adjustCoordinates(contextMenu);
        e.preventDefault();
    },

    removeContextMenus(){
        let contextMenus = document.getElementsByClassName("al-context-menu");
        for(let i = 0; i < contextMenus.length; i++)
            contextMenus[i].classList.remove("al-menu-visible");
    },

    adjustCoordinates(contextMenu){
        let contextMenuX = contextMenu.getBoundingClientRect().x;
        let contextMenuWidth = contextMenu.getBoundingClientRect().width;
        let pageWidth = document.body.getBoundingClientRect().width;
        if(contextMenuX + contextMenuWidth > pageWidth)
            contextMenu.style.left = `${pageWidth - contextMenuWidth}px`;

        let contextMenuY = contextMenu.getBoundingClientRect().y;
        let contextMenuHeight = contextMenu.getBoundingClientRect().height;
        let pageHeight = document.body.getBoundingClientRect().height;
        if(contextMenuY + contextMenuHeight > pageHeight)
            contextMenu.style.top = `${pageHeight - contextMenuHeight}px`;
    },

    submitForm(e){
        e.preventDefault();

        let form = e.currentTarget.querySelector("form");
        form.submit();
    },

    submitFormIndex(e, index){
        e.preventDefault();

        let form = document.getElementsByTagName("form")[index];
        form.submit();
    },

    askConfirm(e){
        e.stopPropagation();
        this.removeContextMenus();
        let confirmElement = document.getElementsByClassName("al-confirm")[0];
        confirmElement.classList.remove("d-none");
        console.log(confirmElement.classList);
    },

    removeConfirmElementHandler(e){
        let needToRemove = false;
        let confirmElement = document.getElementsByClassName("al-confirm")[0];

        if(confirmElement != null){
            if(!confirmElement.classList.contains("d-none")){
                let confirmElementLeft = confirmElement.getBoundingClientRect().x;
                let confirmElementRight = confirmElementLeft + confirmElement.getBoundingClientRect().width;
                let confirmElementTop = confirmElement.getBoundingClientRect().y;
                let confirmElementBottom = confirmElementTop + confirmElement.getBoundingClientRect().height;
            
                if((e.clientX < confirmElementLeft || e.clientX > confirmElementRight) || (e.clientY < confirmElementTop || e.clientY > confirmElementBottom))
                needToRemove = true;
            }
        }

        if(needToRemove)
            confirmElement.classList.add("d-none");
    },

    removeConfirmElement(){
        let confirmElement = document.getElementsByClassName("al-confirm")[0];
        confirmElement.classList.add("d-none");
    }
}