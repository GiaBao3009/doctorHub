<?php
// Include the initialization file
require_once '../../../config/init.php';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bài Test kiểm tra vấn đề Tim Mạch - DoctorHub</title>
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
            <h1 class="test-title">Bài Test kiểm tra vấn đề Tim Mạch</h1>
            <div class="progress-container">
                <div class="progress-bar">
                    <div class="progress-bar-fill" id="progress-bar-fill"></div>
                </div>
                <span class="progress-text" id="progress-text">1/35</span>
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
            question: "Bạn có bị đau ngực hoặc cảm giác tức nặng ở ngực không?",
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
            question: "Bạn có cảm thấy khó thở hoặc hụt hơi khi hoạt động hoặc nghỉ ngơi không?",
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
            question: "Bạn có bị tim đập nhanh hoặc nhịp tim không đều không?",
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
            question: "Bạn có bị chóng mặt hoặc ngất xỉu không rõ nguyên nhân không?",
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
            question: "Bạn có bị sưng phù ở chân, mắt cá chân, hoặc bàn chân không?",
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
            question: "Bạn có cảm thấy mệt mỏi hoặc kiệt sức bất thường không?",
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
            question: "Bạn có bị đau lan từ ngực xuống cánh tay, vai, hoặc hàm không?",
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
            question: "Bạn có bị đổ mồ hôi lạnh hoặc vã mồ hôi không rõ nguyên nhân không?",
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
            question: "Bạn có bị buồn nôn hoặc khó chịu ở dạ dày khi gắng sức không?",
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
            question: "Bạn có bị đau đầu hoặc đau nửa đầu thường xuyên không?",
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
            question: "Bạn có bị yếu hoặc tê đột ngột ở tay, chân, hoặc mặt không?",
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
            question: "Bạn có gặp khó khăn khi nói hoặc hiểu lời nói không?",
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
            question: "Bạn có bị mất thị lực đột ngột ở một hoặc cả hai mắt không?",
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
            question: "Bạn có bị khó khăn khi đi bộ hoặc mất thăng bằng không?",
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
            question: "Bạn có bị cao huyết áp (tăng huyết áp) không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
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
            question: "Bạn có bị cholesterol cao hoặc rối loạn lipid máu không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
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
            question: "Bạn có bị tiểu đường hoặc đường huyết cao không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Thỉnh thoảng",
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
            question: "Bạn có hút thuốc lá hoặc sử dụng các sản phẩm thuốc lá không?",
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
            question: "Bạn có uống rượu bia thường xuyên không?",
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
            question: "Bạn có thừa cân hoặc béo phì không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Hơi thừa cân",
                    score: 1
                },
                {
                    text: "Thừa cân",
                    score: 2
                },
                {
                    text: "Béo phì",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có ít vận động thể chất (ít tập thể dục) không?",
            options: [{
                    text: "Không, tập đều",
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
            question: "Bạn có chế độ ăn nhiều chất béo bão hòa hoặc muối không?",
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
            question: "Bạn có tiền sử gia đình mắc bệnh tim mạch (nhồi máu cơ tim, đột quỵ) không?",
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
            question: "Bạn có bị căng thẳng hoặc áp lực tâm lý kéo dài không?",
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
            question: "Bạn có bị ngưng thở khi ngủ hoặc ngáy to không?",
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
            question: "Bạn có bị bệnh thận mãn tính hoặc suy thận không?",
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
            question: "Bạn có bị viêm khớp dạng thấp hoặc bệnh tự miễn không?",
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
            question: "Bạn có từng bị nhồi máu cơ tim hoặc đột quỵ trước đây không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Có nghi ngờ",
                    score: 1
                },
                {
                    text: "Đã từng",
                    score: 2
                },
                {
                    text: "Nhiều lần",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có sử dụng thuốc điều trị tim mạch (huyết áp, cholesterol) không?",
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
            question: "Bạn có đi kiểm tra huyết áp định kỳ không?",
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
            question: "Bạn có kiểm tra cholesterol và đường huyết định kỳ không?",
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
            question: "Bạn có trên 45 tuổi (nam) hoặc 55 tuổi (nữ) không?",
            options: [{
                    text: "Không",
                    score: 0
                },
                {
                    text: "Gần tuổi",
                    score: 1
                },
                {
                    text: "Đúng tuổi",
                    score: 2
                },
                {
                    text: "Vượt quá",
                    score: 3
                }
            ]
        },
        {
            question: "Bạn có bị đau chân khi đi bộ, giảm khi nghỉ (khập khiễng cách hồi) không?",
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
            question: "Bạn có bị lạnh hoặc tê ở bàn chân hoặc bàn tay không?",
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
            question: "Bạn có nhận thấy da ở chân hoặc tay nhợt nhạt hoặc tím tái không?",
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
            question: "Bạn có đi khám tim mạch định kỳ hoặc làm điện tâm đồ (ECG) không?",
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

        // Kiểm tra các triệu chứng nghiêm trọng (liên quan đến nhồi máu cơ tim hoặc đột quỵ)
        const criticalSymptoms = [0, 1, 3, 6, 7, 10, 11, 12,
        13]; // Đau ngực, khó thở, chóng mặt, đau lan, đổ mồ hôi, yếu/tê, khó nói, mất thị lực, khó đi
        const hasCriticalSymptom = criticalSymptoms.some(index => answers[index] >= 2);

        if (totalScore <= 20) {
            resultMessage =
                "Bạn có rất ít hoặc không có dấu hiệu của vấn đề tim mạch. Hãy duy trì lối sống lành mạnh và kiểm tra sức khỏe định kỳ.";
        } else if (totalScore <= 40) {
            resultMessage =
                "Bạn có một số dấu hiệu hoặc yếu tố nguy cơ liên quan đến tim mạch. Hãy cải thiện lối sống và tham khảo ý kiến bác sĩ tim mạch.";
        } else if (totalScore <= 60) {
            resultMessage =
                "Bạn có nhiều dấu hiệu đáng lo ngại về sức khỏe tim mạch. Hãy đến bác sĩ tim mạch để được kiểm tra và đánh giá.";
        } else {
            resultMessage =
                "Bạn có nguy cơ cao mắc bệnh tim mạch. Hãy đến bệnh viện hoặc bác sĩ tim mạch ngay để được chẩn đoán và điều trị.";
        }

        if (hasCriticalSymptom) {
            resultMessage +=
                "\n\nCẢNH BÁO: Bạn có các triệu chứng nghiêm trọng (như đau ngực, khó thở, yếu/tê đột ngột, hoặc mất thị lực). Đây có thể là dấu hiệu của nhồi máu cơ tim hoặc đột quỵ. Hãy đến bệnh viện NGAY LẬP TỨC.";
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
        doc.text("Kết quả đánh giá Vấn đề Tim Mạch", 105, 30, {
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

        doc.save("ketqua-timmach.pdf");
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