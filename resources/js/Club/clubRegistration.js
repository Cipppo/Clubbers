let step = 1;


function handleSteps(step){
    switch(step){
        case 1:
            step1.style.display = 'block';
            step2.style.display = 'none';
            step3.style.display = 'none';
            break
        case 2:
            step1.style.display = 'none';
            step2.style.display = 'block';
            break
        case 3:
            step2.style.display = "none";
            step3.style.display = "block";
            continueButton.style.display = 'none';
            break;
    }
}




let step1 = document.getElementById("Part1");
let step2 = document.getElementById("Part2");
let step3 = document.getElementById("Part3");
let continueButton = document.getElementById("next");

continueButton.addEventListener('click', function(e){
    step = step + 1;
    console.log(step);
    handleSteps(step);
});


handleSteps(step);