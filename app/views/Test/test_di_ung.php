<?php
// Include the initialization file
require_once '../../../config/init.php';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bài Test Dị ứng thời tiết - DoctorHub</title>
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
            <h1 class="test-title">Bài Test Dị ứng thời tiết</h1>
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
            question: "Bạn có bị hắt hơi liên tục khi thời tiết thay đổi không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị ngứa mũi hoặc chảy nước mũi không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị nghẹt mũi hoặc khó thở qua mũi không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị ngứa mắt hoặc chảy nước mắt không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị đỏ mắt hoặc sưng mí mắt khi thời tiết thay đổi không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị ngứa da hoặc phát ban trên da không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị mề đay hoặc sưng da khi trời lạnh hoặc nóng không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị đau đầu hoặc đau nửa đầu khi thời tiết thay đổi không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị ho hoặc đau họng khi trời trở lạnh không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có cảm thấy khó thở hoặc thở khò khè không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị tức ngực hoặc cảm giác nặng ngực không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị mệt mỏi hoặc kiệt sức khi thời tiết thay đổi không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị đau khớp hoặc đau cơ khi trời lạnh hoặc ẩm không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị chóng mặt hoặc mất thăng bằng không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị ngứa họng hoặc cảm giác kích ứng trong họng không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị sổ mũi hoặc hắt hơi khi trời mưa hoặc độ ẩm cao không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị khô da hoặc nứt nẻ da khi trời lạnh không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị dị ứng hoặc kích ứng khi tiếp xúc với bụi hoặc phấn hoa không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có tiền sử gia đình bị dị ứng thời tiết hoặc dị ứng khác không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Có thể",
                    score: 1
                },
                {
                    text: "Có, người thân cấp 2",
                    score: 2
                },
                {
                    text: "Có, người thân cấp 1",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị dị ứng thực phẩm hoặc thuốc liên quan đến thời tiết không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Liên tục",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có phải sử dụng thuốc kháng histamine để giảm triệu chứng không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Thường xuyên",
                    score: 2
                },
                {
                    text: "Hàng ngày",
                    score: 3
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

        // Kiểm tra các triệu chứng nghiêm trọng
        const criticalSymptoms = [9, 10, 11]; // Câu hỏi về khó thở, thở khò khè, tức ngực
        const hasCriticalSymptom = criticalSymptoms.some(index => answers[index] >= 2);

        if (totalScore <= 10) {
            resultMessage =
                "Bạn có rất ít hoặc không có triệu chứng của dị ứng thời tiết. Hãy tiếp tục giữ gìn sức khỏe.";
        } else if (totalScore <= 20) {
            resultMessage =
                "Bạn có một số triệu chứng nhẹ có thể liên quan đến dị ứng thời tiết. Hãy theo dõi thêm và cân nhắc sử dụng các biện pháp phòng ngừa.";
        } else if (totalScore <= 30) {
            resultMessage =
                "Bạn có nhiều triệu chứng đáng lo ngại. Hãy tham khảo ý kiến bác sĩ hoặc chuyên gia dị ứng để được kiểm tra thêm.";
        } else {
            resultMessage =
                "Bạn có nguy cơ cao bị dị ứng thời tiết. Hãy đến cơ sở y tế để được đánh giá và điều trị kịp thời.";
        }

        if (hasCriticalSymptom) {
            resultMessage +=
                "\n\nCẢNH BÁO: Bạn có các triệu chứng nghiêm trọng (như khó thở hoặc tức ngực). Đây có thể là dấu hiệu của dị ứng nặng hoặc hen suyễn. Hãy đến bệnh viện ngay lập tức.";
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
        doc.text("Kết quả đánh giá Dị ứng thời tiết", 105, 30, {
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

        doc.save("ketqua-diung.pdf");
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