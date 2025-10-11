document.addEventListener('DOMContentLoaded', function() {
    const submitButtons = document.querySelectorAll('.submit-quiz');
    
    submitButtons.forEach(button => {
        button.addEventListener('click', function() {
            const quizId = this.dataset.quizId;
            submitQuiz(quizId);
        });
    });

    function submitQuiz(quizId) {
        const questions = document.querySelectorAll(`.quiz-card[data-quiz-id="${quizId}"] .question`);
        const answers = {};

        questions.forEach(question => {
            const questionId = question.querySelector('input[type="radio"]').name.split('_')[1];
            const selectedOption = question.querySelector('input[type="radio"]:checked');
            
            if (selectedOption) {
                answers[questionId] = selectedOption.value;
            }
        });

        // Send answers to server
        fetch(`/quizzes/${quizId}/submit`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                answers: answers
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showResult(data.score, data.total);
            } else {
                alert('Error submitting quiz');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error submitting quiz');
        });
    }

    function showResult(score, total) {
        const percentage = (score / total) * 100;
        alert(`Quiz submitted!\nScore: ${score}/${total} (${percentage.toFixed(1)}%)`);
    }

    // Add visual feedback for selected options
    document.querySelectorAll('.option input').forEach(radio => {
        radio.addEventListener('change', function() {
            // Remove selected class from all options in the same question
            const question = this.closest('.question');
            question.querySelectorAll('.option').forEach(opt => {
                opt.classList.remove('selected');
            });
            
            // Add selected class to the current option
            this.closest('.option').classList.add('selected');
        });
    });
});