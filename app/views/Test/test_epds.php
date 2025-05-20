<?php
// Include the initialization file
require_once '../../../config/init.php';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bài Test Trầm cảm sau sinh (EPDS) - DoctorHub</title>
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
            <h1 class="test-title">Bài Test Trầm cảm sau sinh (EPDS)</h1>
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
            question: "Tôi có thể cười đùa và nhìn nhận mọi thứ một cách tích cực.",
            options: [{
                    text: "Thường xuyên như trước đây",
                    score: 0
                },
                {
                    text: "Ít hơn trước đây",
                    score: 1
                },
                {
                    text: "Rất ít khi",
                    score: 2
                },
                {
                    text: "Hoàn toàn không thể",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy háo hức với những điều sắp xảy ra.",
            options: [{
                    text: "Như bình thường",
                    score: 0
                },
                {
                    text: "Ít hơn bình thường",
                    score: 1
                },
                {
                    text: "Rất ít",
                    score: 2
                },
                {
                    text: "Không còn háo hức nữa",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi tự trách mình khi mọi thứ không như ý.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy lo lắng hoặc bồn chồn mà không rõ lý do.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy sợ hãi hoặc hoảng loạn mà không có lý do rõ ràng.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy bị quá tải với mọi thứ.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy khó ngủ vì lo lắng hoặc buồn bã.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy buồn bã và chán nản.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy không hạnh phúc đến mức phải khóc.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi có suy nghĩ về việc làm hại bản thân.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy khó tập trung vào công việc hàng ngày.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy mệt mỏi và thiếu năng lượng.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy khó chịu với những việc nhỏ nhặt.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy mình không đủ tốt trong vai trò làm mẹ.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy khó khăn khi chăm sóc con.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy xa cách hoặc không gắn bó với con mình.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy tội lỗi vì không làm tốt vai trò của mình.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy mất hứng thú với các hoạt động từng yêu thích.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy khó đưa ra quyết định trong cuộc sống hàng ngày.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy bi quan về tương lai của mình và con.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
                    score: 3
                }
            ]
        },
        {
            question: "Tôi cảm thấy mình không thể đối mặt với những thử thách hiện tại.",
            options: [{
                    text: "Không bao giờ",
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
                    text: "Hầu như lúc nào cũng vậy",
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

        if (totalScore <= 9) {
            resultMessage = "Bạn không có dấu hiệu trầm cảm sau sinh.";
        } else if (totalScore <= 12) {
            resultMessage =
                "Bạn có thể đang có dấu hiệu trầm cảm sau sinh nhẹ. Hãy theo dõi thêm và cân nhắc chia sẻ với người thân.";
        } else if (totalScore <= 19) {
            resultMessage =
                "Bạn có nguy cơ trầm cảm sau sinh ở mức vừa phải. Hãy tham khảo ý kiến chuyên gia tâm lý hoặc bác sĩ.";
        } else {
            resultMessage =
                "Bạn có nguy cơ cao bị trầm cảm sau sinh. Hãy tìm sự hỗ trợ từ chuyên gia tâm lý hoặc bác sĩ ngay lập tức.";
        }

        // Đặc biệt kiểm tra câu hỏi số 10 (suy nghĩ làm hại bản thân)
        if (answers[9] > 0) {
            resultMessage +=
                "\n\nCẢNH BÁO: Bạn đã báo cáo có suy nghĩ làm hại bản thân. Đây là dấu hiệu nghiêm trọng, hãy liên hệ ngay với chuyên gia hoặc đường dây hỗ trợ khẩn cấp.";
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
        doc.text("Kết quả đánh giá Trầm cảm sau sinh (EPDS)", 105, 30, {
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

        doc.save("ketqua-epds.pdf");
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