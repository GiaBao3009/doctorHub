<?php
// Include the initialization file
require_once '../../../config/init.php';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bài Test Trầm cảm BECK (BDI) - DoctorHub</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <!-- Thư viện SweetAlert và html2pdf -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

    <link rel="stylesheet" href="../../../assets/css/view_test.css">

</head>

<body>
    <div class="test-container">
        <div class="test-header">
            <h1 class="test-title">Bài Test Trầm cảm BECK (BDI)</h1>
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress-bar-fill" id="progress-bar-fill"></div>
                </div>
                <span class="progress-text" id="progress-text">1/21</span>
            </div>
        </div>

        <div id="question-container">
            <div class="question" id="question-text"></div>
            <div class="options" id="options-container"></div>
        </div>

        <div class="navigation">
            <button class="nav-button menu-button" onclick="goToMenu()">Quay lại</button>
            <button class="nav-button prev-button" id="prev-button" onclick="prevQuestion()" disabled>Trước đó</button>
            <button class="nav-button next-button" id="next-button" onclick="nextQuestion()" disabled>Tiếp theo</button>
        </div>
    </div>
    <script>
    const questions = [{
            question: "Bạn cảm thấy tinh thần như thế nào? Có hay buồn hay không?",
            options: [{
                    text: "Tôi cảm thấy tinh thần sảng khoái và vui vẻ",
                    score: 0
                },
                {
                    text: "Nhiều lúc tôi cảm thấy chán nản và buồn bã",
                    score: 1
                },
                {
                    text: "Lúc nào tôi cũng cảm thấy buồn chán và bất thần tới không thể kiểm soát được",
                    score: 2
                },
                {
                    text: "Lúc nào tôi cũng suy nghĩ lo âu, cảm thấy bất hạnh, buồn chán đến mức hoan toàn đau khổ",
                    score: 3
                },
                {
                    text: "Tôi cảm thấy cực kì buồn tủi, tinh thần hoang loạn, khổ sở đến mức không thể chịu đựng được",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có cảm thấy bi quan về tương lai không?",
            options: [{
                    text: "Tôi không cảm thấy bi quan về tương lai",
                    score: 0
                },
                {
                    text: "Tôi cảm thấy bi quan về tương lai hơn trước đây",
                    score: 1
                },
                {
                    text: "Tôi không mong đợi điều gì tốt đẹp trong tương lai",
                    score: 2
                },
                {
                    text: "Tôi cảm thấy tương lai vô vọng và không thể cải thiện",
                    score: 3
                },
                {
                    text: "Tôi cảm thấy không còn gì để hy vọng nữa",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có cảm thấy mình thất bại không?",
            options: [{
                    text: "Tôi không cảm thấy mình là người thất bại",
                    score: 0
                },
                {
                    text: "Tôi cảm thấy mình thất bại hơn so với người khác",
                    score: 1
                },
                {
                    text: "Khi nhìn lại cuộc đời, tôi thấy mình thất bại rất nhiều",
                    score: 2
                },
                {
                    text: "Tôi cảm thấy mình hoàn toàn thất bại",
                    score: 3
                },
                {
                    text: "Tôi cảm thấy mình là một kẻ thất bại toàn diện",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có hài lòng với cuộc sống hiện tại không?",
            options: [{
                    text: "Tôi hài lòng với mọi thứ như hiện tại",
                    score: 0
                },
                {
                    text: "Tôi không còn thấy vui vẻ với những thứ từng làm tôi hài lòng",
                    score: 1
                },
                {
                    text: "Tôi không còn cảm thấy hài lòng với bất cứ điều gì",
                    score: 2
                },
                {
                    text: "Tôi cảm thấy chán ghét mọi thứ",
                    score: 3
                },
                {
                    text: "Tôi cảm thấy không còn gì đáng để hài lòng nữa",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có cảm thấy tội lỗi không?",
            options: [{
                    text: "Tôi không cảm thấy tội lỗi",
                    score: 0
                },
                {
                    text: "Tôi cảm thấy tội lỗi trong một vài trường hợp",
                    score: 1
                },
                {
                    text: "Tôi cảm thấy tội lỗi khá thường xuyên",
                    score: 2
                },
                {
                    text: "Tôi cảm thấy tội lỗi hầu hết mọi lúc",
                    score: 3
                },
                {
                    text: "Tôi cảm thấy tội lỗi liên tục và không thể thoát ra",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có cảm thấy mình đang bị trừng phạt không?",
            options: [{
                    text: "Tôi không cảm thấy mình đang bị trừng phạt",
                    score: 0
                },
                {
                    text: "Tôi cảm thấy có thể mình đang bị trừng phạt",
                    score: 1
                },
                {
                    text: "Tôi mong đợi mình sẽ bị trừng phạt",
                    score: 2
                },
                {
                    text: "Tôi cảm thấy mình đang bị trừng phạt",
                    score: 3
                },
                {
                    text: "Tôi chắc chắn mình đang bị trừng phạt",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có cảm thấy thất vọng về bản thân không?",
            options: [{
                    text: "Tôi không cảm thấy thất vọng về bản thân",
                    score: 0
                },
                {
                    text: "Tôi cảm thấy thất vọng về bản thân một chút",
                    score: 1
                },
                {
                    text: "Tôi cảm thấy rất thất vọng về bản thân",
                    score: 2
                },
                {
                    text: "Tôi ghét bản thân mình",
                    score: 3
                },
                {
                    text: "Tôi hoàn toàn chán ghét bản thân",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có tự trách mình không?",
            options: [{
                    text: "Tôi không tự trách mình",
                    score: 0
                },
                {
                    text: "Tôi tự trách mình vì những sai lầm nhỏ",
                    score: 1
                },
                {
                    text: "Tôi tự trách mình vì mọi thứ không tốt",
                    score: 2
                },
                {
                    text: "Tôi tự trách mình vì mọi điều tồi tệ xảy ra",
                    score: 3
                },
                {
                    text: "Tôi tự trách mình đến mức cảm thấy không đáng sống",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có nghĩ đến việc tự tử không?",
            options: [{
                    text: "Tôi không nghĩ đến việc tự tử",
                    score: 0
                },
                {
                    text: "Tôi có nghĩ đến việc tự tử nhưng không làm",
                    score: 1
                },
                {
                    text: "Tôi muốn tự tử",
                    score: 2
                },
                {
                    text: "Tôi sẽ tự tử nếu có cơ hội",
                    score: 3
                },
                {
                    text: "Tôi chắc chắn sẽ tự tử nếu có thể",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có hay khóc không?",
            options: [{
                    text: "Tôi không khóc nhiều hơn bình thường",
                    score: 0
                },
                {
                    text: "Tôi khóc nhiều hơn trước đây",
                    score: 1
                },
                {
                    text: "Tôi khóc rất nhiều, hầu như mỗi ngày",
                    score: 2
                },
                {
                    text: "Tôi muốn khóc nhưng không thể khóc được",
                    score: 3
                },
                {
                    text: "Tôi cảm thấy không còn khả năng khóc nữa",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có dễ bị kích động không?",
            options: [{
                    text: "Tôi không dễ bị kích động hơn bình thường",
                    score: 0
                },
                {
                    text: "Tôi dễ bị kích động hơn trước đây",
                    score: 1
                },
                {
                    text: "Tôi thường xuyên cảm thấy kích động",
                    score: 2
                },
                {
                    text: "Tôi luôn cảm thấy kích động và không thể kiểm soát",
                    score: 3
                },
                {
                    text: "Tôi cảm thấy kích động đến mức không thể chịu đựng",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có mất hứng thú với mọi thứ không?",
            options: [{
                    text: "Tôi không mất hứng thú với mọi thứ",
                    score: 0
                },
                {
                    text: "Tôi ít hứng thú với mọi thứ hơn trước",
                    score: 1
                },
                {
                    text: "Tôi mất hứng thú với hầu hết mọi thứ",
                    score: 2
                },
                {
                    text: "Tôi không còn hứng thú với bất cứ điều gì",
                    score: 3
                },
                {
                    text: "Tôi hoàn toàn không còn hứng thú với cuộc sống",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có khó đưa ra quyết định không?",
            options: [{
                    text: "Tôi không gặp khó khăn khi đưa ra quyết định",
                    score: 0
                },
                {
                    text: "Tôi gặp khó khăn hơn trước khi đưa ra quyết định",
                    score: 1
                },
                {
                    text: "Tôi rất khó đưa ra quyết định",
                    score: 2
                },
                {
                    text: "Tôi hầu như không thể đưa ra quyết định",
                    score: 3
                },
                {
                    text: "Tôi hoàn toàn không thể đưa ra quyết định",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có cảm thấy mình vô dụng không?",
            options: [{
                    text: "Tôi không cảm thấy mình vô dụng",
                    score: 0
                },
                {
                    text: "Tôi cảm thấy mình vô dụng hơn trước",
                    score: 1
                },
                {
                    text: "Tôi cảm thấy mình khá vô dụng",
                    score: 2
                },
                {
                    text: "Tôi cảm thấy mình hoàn toàn vô dụng",
                    score: 3
                },
                {
                    text: "Tôi cảm thấy mình không còn giá trị gì",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có cảm thấy mất năng lượng không?",
            options: [{
                    text: "Tôi không cảm thấy mất năng lượng",
                    score: 0
                },
                {
                    text: "Tôi cảm thấy mất năng lượng hơn trước",
                    score: 1
                },
                {
                    text: "Tôi luôn cảm thấy mệt mỏi và thiếu năng lượng",
                    score: 2
                },
                {
                    text: "Tôi cảm thấy kiệt sức, không thể làm gì",
                    score: 3
                },
                {
                    text: "Tôi hoàn toàn không có năng lượng để làm bất cứ việc gì",
                    score: 4
                }
            ]
        },
        {
            question: "Thói quen ngủ của bạn có thay đổi không?",
            options: [{
                    text: "Thói quen ngủ của tôi không thay đổi",
                    score: 0
                },
                {
                    text: "Tôi ngủ ít hoặc nhiều hơn bình thường",
                    score: 1
                },
                {
                    text: "Tôi gặp khó khăn khi ngủ hoặc ngủ quá nhiều",
                    score: 2
                },
                {
                    text: "Tôi hầu như không thể ngủ hoặc ngủ suốt ngày",
                    score: 3
                },
                {
                    text: "Tôi không thể ngủ hoặc ngủ liên tục không kiểm soát",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có dễ cáu gắt không?",
            options: [{
                    text: "Tôi không dễ cáu gắt hơn bình thường",
                    score: 0
                },
                {
                    text: "Tôi dễ cáu gắt hơn trước đây",
                    score: 1
                },
                {
                    text: "Tôi thường xuyên cáu gắt",
                    score: 2
                },
                {
                    text: "Tôi luôn cáu gắt và không thể kiểm soát",
                    score: 3
                },
                {
                    text: "Tôi cáu gắt đến mức không thể chịu đựng",
                    score: 4
                }
            ]
        },
        {
            question: "Thói quen ăn uống của bạn có thay đổi không?",
            options: [{
                    text: "Thói quen ăn uống của tôi không thay đổi",
                    score: 0
                },
                {
                    text: "Tôi ăn ít hoặc nhiều hơn bình thường",
                    score: 1
                },
                {
                    text: "Tôi mất cảm giác thèm ăn hoặc ăn quá nhiều",
                    score: 2
                },
                {
                    text: "Tôi hầu như không thể ăn hoặc ăn không kiểm soát",
                    score: 3
                },
                {
                    text: "Tôi không thể ăn hoặc ăn liên tục không kiểm soát",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có khó tập trung không?",
            options: [{
                    text: "Tôi không gặp khó khăn khi tập trung",
                    score: 0
                },
                {
                    text: "Tôi khó tập trung hơn trước",
                    score: 1
                },
                {
                    text: "Tôi rất khó tập trung vào bất cứ việc gì",
                    score: 2
                },
                {
                    text: "Tôi hầu như không thể tập trung",
                    score: 3
                },
                {
                    text: "Tôi hoàn toàn không thể tập trung",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có cảm thấy mệt mỏi không?",
            options: [{
                    text: "Tôi không cảm thấy mệt mỏi hơn bình thường",
                    score: 0
                },
                {
                    text: "Tôi cảm thấy mệt mỏi hơn trước",
                    score: 1
                },
                {
                    text: "Tôi luôn cảm thấy mệt mỏi",
                    score: 2
                },
                {
                    text: "Tôi cảm thấy kiệt sức, không thể làm gì",
                    score: 3
                },
                {
                    text: "Tôi hoàn toàn kiệt sức, không thể hoạt động",
                    score: 4
                }
            ]
        },
        {
            question: "Bạn có mất hứng thú với các hoạt động xã hội không?",
            options: [{
                    text: "Tôi không mất hứng thú với các hoạt động xã hội",
                    score: 0
                },
                {
                    text: "Tôi ít hứng thú với các hoạt động xã hội hơn trước",
                    score: 1
                },
                {
                    text: "Tôi mất hứng thú với hầu hết các hoạt động xã hội",
                    score: 2
                },
                {
                    text: "Tôi không còn hứng thú với bất kỳ hoạt động xã hội nào",
                    score: 3
                },
                {
                    text: "Tôi hoàn toàn không muốn tham gia bất kỳ hoạt động xã hội nào",
                    score: 4
                }
            ]
        }
    ];

    let currentQuestionIndex = 0;
    let answers = new Array(questions.length).fill(null);

    function loadQuestion(index) {
        const question = questions[index];
        document.getElementById('question-text').textContent = question.question;
        const optionsContainer = document.getElementById('options-container');
        optionsContainer.innerHTML = '';

        question.options.forEach((option, i) => {
            const div = document.createElement('div');
            div.className = 'option';
            div.innerHTML = `
                    <input type="radio" name="option" id="option-${i}" value="${option.score}" ${answers[index] === option.score ? 'checked' : ''}>
                    <label for="option-${i}">${option.text}</label>
                `;
            optionsContainer.appendChild(div);
        });

        updateProgress();
        updateButtons();
    }

    function updateProgress() {
        const progressText = document.getElementById('progress-text');
        progressText.textContent = `${currentQuestionIndex + 1}/${questions.length}`;
        const progressBarFill = document.getElementById('progress-bar-fill');
        const progressPercent = ((currentQuestionIndex + 1) / questions.length) * 100;
        progressBarFill.style.width = `${progressPercent}%`;
    }

    function updateButtons() {
        const prevButton = document.getElementById('prev-button');
        const nextButton = document.getElementById('next-button');
        prevButton.disabled = currentQuestionIndex === 0;
        nextButton.disabled = answers[currentQuestionIndex] === null;

        if (currentQuestionIndex === questions.length - 1 && answers[currentQuestionIndex] !== null) {
            nextButton.textContent = 'Hoàn thành';
        } else {
            nextButton.textContent = 'Tiếp theo';
        }
    }

    function nextQuestion() {
        if (currentQuestionIndex < questions.length - 1) {
            currentQuestionIndex++;
            loadQuestion(currentQuestionIndex);
        } else {
            calculateResult();
        }
    }

    function prevQuestion() {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            loadQuestion(currentQuestionIndex);
        }
    }

    function goToMenu() {
        window.location.href = '../../views/test.php';
    }

    function calculateResult() {
        const totalScore = answers.reduce((sum, score) => sum + (score || 0), 0);
        let resultMessage = '';

        if (totalScore <= 10) {
            resultMessage = "Bạn không có dấu hiệu trầm cảm.";
        } else if (totalScore <= 18) {
            resultMessage = "Bạn có thể đang bị trầm cảm nhẹ.";
        } else if (totalScore <= 29) {
            resultMessage = "Bạn có thể đang bị trầm cảm vừa. Hãy cân nhắc gặp chuyên gia tâm lý.";
        } else {
            resultMessage = "Bạn có thể đang bị trầm cảm nặng. Hãy tìm sự giúp đỡ từ chuyên gia ngay lập tức.";
        }

        const resultText = `Điểm số của bạn: ${totalScore}\n${resultMessage}`;

        swal({
            title: "Kết quả đánh giá",
            text: resultText,
            icon: "success",
            buttons: {
                cancel: {
                    text: "Thoát",
                    visible: true,
                    className: "btn btn-danger",

                },
                confirm: {
                    text: "Quay lại",
                    className: "btn btn-primary"
                },
                download: {
                    text: "Xuất PDF",
                    value: "download",
                    className: "btn btn-success"
                }
            }
        }).then((value) => {
            if (value === true) {
                window.location.href = '../../views/test.php';
            } else if (value === "download") {
                generatePDF(totalScore, resultMessage);
            }
        });
    }

    function generatePDF(score, message) {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF();

        doc.setFontSize(20);
        doc.text("Kết quả đánh giá trầm cảm", 105, 30, {
            align: "center"
        });

        doc.setFontSize(14);
        doc.setTextColor(50, 50, 50);
        doc.text(`Điểm số của bạn: ${score}`, 20, 50);

        doc.setFontSize(12);
        doc.setTextColor(80, 80, 80);
        let splitText = doc.splitTextToSize(message, 170);
        doc.text(splitText, 20, 70);

        doc.setFontSize(10);
        doc.setTextColor(150, 150, 150);
        doc.text("Generated by DoctorHub", 105, 290, {
            align: "center"
        });

        doc.save("ketqua-tramcam.pdf");
    }


    document.getElementById('options-container').addEventListener('change', (e) => {
        answers[currentQuestionIndex] = parseInt(e.target.value);
        updateButtons();
    });

    // Load the first question
    loadQuestion(currentQuestionIndex);
    </script>

    <!-- <script type="module">
    import {
        questionSets,
        resultCalculators
    } from '../../assets/javascript/questionSets.js';
    import {
        initializeTest
    } from '../../assets/javascript/handleLogicQuestion.js';
    const questions = questionSets['BDI'];
    const resultCalculator = resultCalculators['BDI'];
    initializeTest(questions, resultCalculator);
    </script> -->
</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

</html>