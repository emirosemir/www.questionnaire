function insertAnswersInput() {
    document.getElementById("answers").value = "";
    for (let i = 0; i < document.getElementsByClassName("answer").length; i++) {
        var answersValue = document.getElementById("answers").value;

        if (answersValue != "") {
            document.getElementById("answers").value = `${answersValue}, ${document.getElementsByClassName("answer")[i].value}`;
        } else {
            document.getElementById("answers").value = document.getElementsByClassName("answer")[i].value;
        }
    }
}

function newAnswer() {
    if (document.getElementsByClassName("answer").length > 0) {
        var lastIndex = document.getElementsByClassName("answer").length;
        
        //Create element and append element...
        var answerDiv = document.createElement("div");
        answerDiv.setAttribute("class", "mb-2");
        var answerLabel = document.createElement("label");
        answerLabel.setAttribute("for", `answer-${lastIndex + 1}`);
        answerLabel.setAttribute("class", "form-label ms-2");
        var answerLabelText = document.createTextNode(`Answer ${lastIndex + 1}`);
        answerLabel.appendChild(answerLabelText);
        answerDiv.appendChild(answerLabel);
        var answerInput = document.createElement("input");
        answerInput.setAttribute("onchange", "insertAnswersInput()");
        answerInput.setAttribute("type", "text");
        answerInput.setAttribute("id", `answer-${lastIndex + 1}`);
        answerInput.setAttribute("class", "form-control answer");
        answerDiv.appendChild(answerInput);
        document.getElementsByClassName("answers")[0].appendChild(answerDiv);
    }
}