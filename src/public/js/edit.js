const choicesLimit = 10; // 設問ごとの選択肢数上限

// ファイルをアップロードするとプレビューする
function previewFile(file, iteration) {
    var fileData = new FileReader();
    fileData.onload = (function () {
        document.getElementById(`imagePreview${iteration}`).src = fileData.result;
    });
    fileData.readAsDataURL(file.files[0]);
}

// 選択肢を追加
function addChoice(iteration) {
    const newChoice =
        `<li class="questions__inner__question__content__choices__list__choice">
            <input name="question{{ $question->id }}[choices][]" type="text" class="questions__inner__question__content__choices__list__choice__input">
        </li>`;

    const choicesList = document.getElementById(`choicesList${iteration}`);
    // 最後の入力欄が空でなかったら新しい入力欄を追加
    if (document.querySelectorAll(`#choicesList${iteration} :last-child input`)[0].value != '' && choicesList.childElementCount < choicesLimit) {
        choicesList.insertAdjacentHTML('beforeend', newChoice);
    }
}

// 設問を追加
function addQuestion() {
    const questionsList = document.getElementById('questionsList');
    const newQuestionNum = questionsList.childElementCount + 1;
    const newQuestion =
        `<div class="questions__inner__question">
            <h3 class="questions__inner__question__headding">${newQuestionNum}問目</h3>
            <div class="questions__inner__question__content">
                <div class="questions__inner__question__content__image">
                    <input name="question{{ $question->id }}[image]" type="file" id="questionImage${newQuestionNum}" onchange="previewFile(this, ${11})"
                        class="questions__inner__question__content__image__input">
                    <div class="questions__inner__question__content__image__preview">
                        <img src="" id="imagePreview${newQuestionNum}">
                    </div>
                </div>
                <div class="questions__inner__question__content__choices">
                    <ul class="questions__inner__question__content__choices__list" id="choicesList${11}">
                        <li class="questions__inner__question__content__choices__list__choice">
                            <input name="question{{ $question->id }}[choices][]" type="text" value=""
                                class="questions__inner__question__content__choices__list__choice__input">
                        </li>
                    </ul>
                    <div class="questions__inner__question__content__choices__add add_btn"
                        onclick="addChoice(${newQuestionNum})" id="addChoiceBtn">+ 選択肢を追加</div>
                </div>
            </div>
        </div>`;

    questionsList.insertAdjacentHTML('beforeend', newQuestion);
}
