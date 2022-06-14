function clickfunction(questionId, clickedChoiceId, valid) {
    //選択肢の色を変える
    const clickedChoice = document.getElementById(`choice${questionId}_${clickedChoiceId}`);
    clickedChoice.classList.add('clicked-choice');
    const validChoice = document.getElementById(`choice${questionId}_1`);
    validChoice.classList.add('valid-choice');
    //クリック無効化
    const choices = document.querySelectorAll(`#choices${questionId} li`);
    choices.forEach((li) => {
        li.style.pointerEvents = 'none';
    });

    //ボックスを表示する
    const commentTitle = document.getElementById(`comment_title${questionId}`);
    if (valid) {
        commentTitle.innerText = '正解！';
        commentTitle.style.borderBottom = 'solid 3px #287dff';
    } else {
        commentTitle.innerText = '不正解！';
        commentTitle.style.borderBottom = 'solid 3px #ff5128';
    }
    const commentBox = document.getElementById(`comment_box${questionId}`);
    document.getElementById(`comment_text${questionId}`).innerText = `正解は「${validChoice.innerText}」です！`;
    commentBox.classList.remove('hide');
}
