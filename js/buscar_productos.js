document.addEventListener("keyup", e=>{

    if (e.target.matches("#buscador")){

        if(e.key ==="Escape")e.target.value = ""

        document.querySelectorAll(".articulo").forEach(prod => {

            prod.textContent.toLowerCase().includes(e.target.value.toLowerCase())
            ?prod.classList.remove("filtrobuscador")
            :prod.classList.add("filtrobuscador")
        })

    }
})
