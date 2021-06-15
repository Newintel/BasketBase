function deactivate(){
    const a = document.getElementById("dead");
    const els = document.querySelectorAll("#active-div, #active-div + br");
    for (el of els){
        el.style.display = a.checked && "none" || "block";
        console.log(els.length);
    }
}