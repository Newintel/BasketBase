function deactivate(element, selector, empty){
    const els = document.querySelectorAll(`${selector}, ${selector}+br`);
    for (el of els){
        el.style.display = element.checked && "none" || "block";
    }
    if (empty) document.querySelector(`${selector} input`).checked = false;
}

function updatePosition(element, val){
    changeVal = document.getElementById("position");
    changeVal.setAttribute('val', +changeVal.getAttribute('val') + (element.checked ? val : -val));
    const final = [];
    const positions = ['G', 'F', 'C'];
    for (let i = 0; i <= 2; i++){
        let a = 2**i;
        if (+changeVal.getAttribute('val') & a){
            final.push(positions[i]);
        }
        console.log(`${+changeVal.getAttribute('val')}, ${+changeVal.getAttribute('val') & a}`);
    }
    changeVal.value = final.join();
}

function retiredin(element){
    if (element.checked){
        const a = prompt("When did he/she retire? (write 2019 for 2019-2020 season)");
        element.value = +a;
    } else {
        element.value = 0;
    }
}