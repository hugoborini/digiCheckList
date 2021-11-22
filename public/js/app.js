let add = document.querySelector(".add")
let containerAdd = document.querySelector(".ContainerAdd")
let plus = document.querySelector(".plus")
let input = document.querySelector("input")
let button = document.querySelector("button")
let body = document.querySelector(".body")
let checks = document.querySelectorAll(".check")
let container = document.querySelector(".container")

console.log(add);
console.log(containerAdd);

add.addEventListener("click", ()=>{
    containerAdd.classList.toggle("show")
    plus.classList.toggle("plusToCross")
    setTimeout(() => {
        container.classList.toggle("showContainer")
    }, 500);
})


button.addEventListener("click", ()=>{
    $.ajax({
        url: "/api/ajax",
        type: "post",
        data: {todo: input.value},
        success:function(data){
            body.innerHTML += ` 
            <div class="item"><div class="checkContainer"><div class="check"></div></div><div class="todo"><p>${input.value}</p></div></div>
            `
            checks = document.querySelectorAll(".check")

            checkssup()

            input.value = ""
            
        }
    })

    
    containerAdd.classList.toggle("show")
    plus.classList.toggle("plusToCross")

})



function checkssup() {
    
    checks.forEach(check =>{
            check.addEventListener("click", ()=>{
                if(check.id){
                    if(confirm("voulez vous supprimer ?")){
                        $.ajax({
                            url: "/api/ajaxsup",
                            type: "post",
                            data: {id_todo: check.id},
                            success:function(data){
                                document.querySelector(`#item_${check.id}`).classList.add("sup")
                                setTimeout(() => {
                                    document.querySelector(`#item_${check.id}`).classList.add("none")
                                }, 1000);
                                
                            }
                        })
                    }

                } else{
                    alert("recharger pour supprimer cette digiActivité")
                }
            })
         
  
        
    
    })
}

checkssup()