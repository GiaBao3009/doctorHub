<?php
// Include the initialization file
require_once '../../../config/init.php';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bài Test Rối loạn lo âu ZUNG (SAS) - DoctorHub</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <!-- Thư viện SweetAlert và jsPDF -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <link rel="stylesheet" href="../../../assets/css/view_test.css">
</head>

<body>
    <div class="test-container">
        <div class="test-header">
            <h1 class="test-title">Bài Test Rối loạn lo âu ZUNG (SAS)</h1>
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
            question: "Tôi cảm thấy lo lắng hoặc bồn chồn hơn bình thường.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy sợ hãi mà không có lý do rõ ràng.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi dễ bị kích động hoặc hoảng loạn.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy như mình đang mất kiểm soát.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy tim đập nhanh hoặc hồi hộp.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy khó thở hoặc ngột ngạt.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy run rẩy hoặc đổ mồ hôi khi lo lắng.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy căng thẳng hoặc khó thư giãn.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy đau hoặc khó chịu ở vùng ngực.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy chóng mặt hoặc muốn ngất xỉu.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy tê hoặc ngứa ran ở tay chân.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy nóng bừng hoặc lạnh run.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy khó tiêu hoặc khó chịu ở dạ dày.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy khó ngủ hoặc ngủ không ngon giấc.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy mệt mỏi hoặc kiệt sức.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy khó tập trung vào công việc.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy lo lắng về những tình huống có thể xảy ra.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy sợ hãi khi nghĩ về một số tình huống.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy bồn chồn, không thể ngồi yên.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy khó đưa ra quyết định.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
                    score: 4
                }
            ]
        },
        {
            question: "Tôi cảm thấy như có điều gì đó tồi tệ sắp xảy ra.",
            options: [{
                    text: "Không bao giờ",
                    score: 1
                },
                {
                    text: "Thỉnh thoảng",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                },
                {
                    text: "Hầu như lúc nào cũng vậy",
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
        const adjustedScore = Math.round((totalScore / 84) * 100); // Chuyển đổi sang thang điểm 100
        let resultMessage = '';

        if (adjustedScore < 50) {
            resultMessage = "Bạn không có dấu hiệu rối loạn lo âu đáng lo ngại.";
        } else if (adjustedScore <= 59) {
            resultMessage =
                "Bạn có thể đang có dấu hiệu rối loạn lo âu nhẹ. Hãy theo dõi thêm và cân nhắc chia sẻ với chuyên gia.";
        } else if (adjustedScore <= 69) {
            resultMessage =
                "Bạn có nguy cơ rối loạn lo âu ở mức vừa phải. Hãy tham khảo ý kiến chuyên gia tâm lý hoặc bác sĩ.";
        } else {
            resultMessage =
                "Bạn có nguy cơ cao bị rối loạn lo âu. Hãy tìm sự hỗ trợ từ chuyên gia tâm lý hoặc bác sĩ ngay lập tức.";
        }

        const resultText = `Điểm số của bạn: ${adjustedScore} (trên thang 100)\n${resultMessage}`;

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
                generatePDF(adjustedScore, resultMessage);
            }
        });
    }

    function generatePDF(score, message) {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF();

        doc.setFontSize(20);
        doc.text("Kết quả đánh giá Rối loạn lo âu ZUNG (SAS)", 105, 30, {
            align: "center"
        });

        doc.setFontSize(14);
        doc.setTextColor(50, 50, 50);
        doc.text(`Điểm số của bạn: ${score} (trên thang 100)`, 20, 50);

        doc.setFontSize(12);
        doc.setTextColor(80, 80, 80);
        let splitText = doc.splitText - doc.text(splitText, 20, 70);

        doc.setFontSize(10);
        doc.setTextColor(150, 150, 150);
        doc.text("Generated by DoctorHub", 105, 290, {
            align: "center"
        });

        doc.save("ketqua-sas.pdf");
    }

    document.getElementById('options-container').addEventListener('change', (e) => {
        answers[currentQuestionIndex] = parseInt(e.target.value);
        updateButtons();
    });

    // Load the first question
    loadQuestion(currentQuestionIndex);
    </script>
</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</html>