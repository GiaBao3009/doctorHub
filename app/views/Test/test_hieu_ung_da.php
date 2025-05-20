<?php
// Include the initialization file
require_once '../../../config/init.php';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bài Test kiểm tra dấu hiệu Ung thư da - DoctorHub</title>
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
            <h1 class="test-title">Bài Test kiểm tra dấu hiệu Ung thư da</h1>
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
            question: "Bạn có nhận thấy nốt ruồi hoặc vết trên da thay đổi kích thước không?",
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
                    text: "Rất rõ ràng",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có thấy nốt ruồi hoặc vết trên da có hình dạng không đối xứng không?",
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
                    text: "Rất rõ ràng",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có thấy nốt ruồi hoặc vết trên da có viền không đều hoặc lởm chởm không?",
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
                    text: "Rất rõ ràng",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có thấy nốt ruồi hoặc vết trên da có nhiều màu sắc (đen, nâu, đỏ, trắng, xanh) không?",
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
                    text: "Rất rõ ràng",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có thấy nốt ruồi hoặc vết trên da có đường kính lớn hơn 6mm không?",
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
                    text: "Rất rõ ràng",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có thấy vết trên da bị ngứa hoặc đau không?",
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
            question: "Bạn có thấy vết trên da bị chảy máu hoặc rỉ dịch không?",
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
            question: "Bạn có thấy vết trên da không lành sau vài tuần không?",
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
            question: "Bạn có thấy xuất hiện các vết loét hoặc tổn thương mới trên da không?",
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
            question: "Bạn có thấy da ở một vùng nào đó trở nên đỏ, sần sùi, hoặc có vảy không?",
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
            question: "Bạn có thấy da ở một vùng nào đó bị sưng hoặc nổi cục không?",
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
            question: "Bạn có thường xuyên tiếp xúc với ánh nắng mặt trời mà không bảo vệ da không?",
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
        },
        {
            question: "Bạn có từng bị cháy nắng nghiêm trọng (bỏng rộp da) không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "1-2 lần",
                    score: 1
                },
                {
                    text: "Nhiều lần",
                    score: 2
                },
                {
                    text: "Thường xuyên",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có sử dụng giường tắm nắng hoặc đèn UV nhân tạo không?",
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
                    text: "Hàng tuần",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có tiền sử gia đình mắc ung thư da không?",
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
            question: "Bạn có làn da sáng, dễ bị cháy nắng, hoặc nhiều tàn nhang không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Hơi sáng",
                    score: 1
                },
                {
                    text: "Rất sáng",
                    score: 2
                },
                {
                    text: "Sáng và nhiều tàn nhang",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có nhiều nốt ruồi (hơn 50) trên cơ thể không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Có vài nốt",
                    score: 1
                },
                {
                    text: "Có nhiều nốt",
                    score: 2
                },
                {
                    text: "Rất nhiều",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có từng bị chẩn đoán mắc bệnh da liễu mãn tính (như vảy nến) không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Có thể",
                    score: 1
                },
                {
                    text: "Đã được chẩn đoán",
                    score: 2
                },
                {
                    text: "Đang điều trị",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có từng tiếp xúc với hóa chất độc hại hoặc bức xạ không?",
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
            question: "Bạn có đi khám da liễu định kỳ để kiểm tra da không?",
            options: [{
                    text: "Có, đều đặn",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
                    score: 1
                },
                {
                    text: "Hiếm khi",
                    score: 2
                },
                {
                    text: "Không bao giờ",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có nhận thấy da ở một vùng nào đó thay đổi bất thường trong vài tháng qua không?",
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
                    text: "Rất rõ ràng",
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

        // Kiểm tra các triệu chứng nghiêm trọng theo quy tắc ABCDE
        const criticalSymptoms = [0, 1, 2, 3, 4, 6, 7, 8]; // Câu hỏi về ABCDE, chảy máu, không lành, tổn thương mới
        const hasCriticalSymptom = criticalSymptoms.some(index => answers[index] >= 2);

        if (totalScore <= 10) {
            resultMessage =
                "Bạn có rất ít hoặc không có dấu hiệu của ung thư da. Hãy duy trì thói quen bảo vệ da và kiểm tra định kỳ.";
        } else if (totalScore <= 20) {
            resultMessage =
                "Bạn có một số dấu hiệu hoặc yếu tố nguy cơ liên quan đến ung thư da. Hãy theo dõi da thường xuyên và tham khảo ý kiến bác sĩ da liễu.";
        } else if (totalScore <= 30) {
            resultMessage =
                "Bạn có nhiều dấu hiệu đáng lo ngại. Hãy đến bác sĩ da liễu để được kiểm tra và đánh giá nguy cơ ung thư da.";
        } else {
            resultMessage =
                "Bạn có nguy cơ cao mắc ung thư da. Hãy đến bệnh viện hoặc bác sĩ da liễu ngay để được chẩn đoán và điều trị.";
        }

        if (hasCriticalSymptom) {
            resultMessage +=
                "\n\nCẢNH BÁO: Bạn có các dấu hiệu nghiêm trọng (như nốt ruồi thay đổi, chảy máu, hoặc tổn thương không lành). Đây có thể là dấu hiệu của ung thư da. Hãy đến bác sĩ da liễu ngay lập tức.";
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