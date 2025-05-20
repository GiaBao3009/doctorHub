// Đảm bảo tất cả các chức năng đều được khởi tạo sau khi trang đã tải xong
document.addEventListener('DOMContentLoaded', function() {
    // Thiết lập sự kiện click cho các mục sidebar
    document.querySelectorAll('.sidebar-item').forEach(item => {
        item.addEventListener('click', function() {
            const pageName = this.dataset.page;
            showSection(pageName + '-section');
        });
    });
    
    // Lắng nghe sự kiện thay đổi filter cho bảng appointments
    document.getElementById('appointment-filter')?.addEventListener('change', function() {
        filterAppointments(this.value);
    });
    
    // Thiết lập chức năng chỉnh sửa hồ sơ
    setupProfileEditing();
    
    // Kiểm tra URL hash để hiển thị đúng section
    if (window.location.hash) {
        const sectionId = window.location.hash.substring(1);
        if (document.getElementById(sectionId)) {
            showSection(sectionId);
        }
    }
});

// Hàm hiển thị section
function showSection(sectionId) {
    console.log("Showing section:", sectionId);
    
    // Ẩn tất cả các section
    document.querySelectorAll('.content-section').forEach(section => {
        section.classList.remove('active');
    });
    
    // Hiển thị section được chọn
    const targetSection = document.getElementById(sectionId);
    if (targetSection) {
        targetSection.classList.add('active');
    }
    
    // Cập nhật active state cho sidebar
    document.querySelectorAll('.sidebar-item').forEach(item => {
        item.classList.remove('active');
    });
    
    // Tìm sidebar item tương ứng và set active
    let sectionMap = {
        'dashboard-section': 'dashboard',
        'appointments-section': 'appointments',
        'patients-section': 'patients',
        'profile-section': 'profile',
        'prescriptions-section': 'prescriptions'
    };
    
    let menuItem = document.querySelector('.sidebar-item[data-page="' + sectionMap[sectionId] + '"]');
    if (menuItem) {
        menuItem.classList.add('active');
    }
    
    // Load data for prescriptions section if needed
    if (sectionId === 'prescriptions-section') {
        loadPrescriptions();
    }
}

// Load prescriptions function
function loadPrescriptions() {
    console.log("Loading prescriptions data");
    
    // Get doctor ID from the page
    const doctorId = document.querySelector('meta[name="doctor-id"]')?.content;
    
    if (!doctorId) {
        console.error('Doctor ID not found in meta tag');
        return;
    }
    
    // Update active prescriptions table
    fetch('../../controllers/prescriptions/get_prescriptions.php?doctor_id=' + doctorId + '&status=active')
        .then(response => response.json())
        .then(data => {
            updatePrescriptionTable('active-prescriptions-table', data);
        })
        .catch(error => {
            console.error('Error loading active prescriptions:', error);
            document.querySelector('#active-prescriptions-table tbody').innerHTML = 
                '<tr><td colspan="6" class="text-center py-3">Lỗi khi tải dữ liệu</td></tr>';
        });
    
    // Update completed prescriptions table
    fetch('../../controllers/prescriptions/get_prescriptions.php?doctor_id=' + doctorId + '&status=completed')
        .then(response => response.json())
        .then(data => {
            updatePrescriptionTable('completed-prescriptions-table', data);
        })
        .catch(error => {
            console.error('Error loading completed prescriptions:', error);
            document.querySelector('#completed-prescriptions-table tbody').innerHTML = 
                '<tr><td colspan="6" class="text-center py-3">Lỗi khi tải dữ liệu</td></tr>';
        });
}

// Helper function to update prescription tables
function updatePrescriptionTable(tableId, prescriptions) {
    const tableBody = document.querySelector('#' + tableId + ' tbody');
    
    if (!prescriptions || !Array.isArray(prescriptions) || prescriptions.length === 0) {
        tableBody.innerHTML = '<tr><td colspan="6" class="text-center py-3">Không có đơn thuốc nào</td></tr>';
        return;
    }
    
    let html = '';
    prescriptions.forEach(prescription => {
        html += '<tr>' +
            '<td>' + (prescription.id || '') + '</td>' +
            '<td>' +
                '<div class="d-flex align-items-center">' +
                    '<img src="../../assets/images/avatar1.jpg" alt="Avatar" class="rounded-circle me-2" width="32" height="32">' +
                    '<div>' +
                        '<div class="fw-medium">' + (prescription.patient_name || 'Không có tên') + '</div>' +
                        '<div class="small text-muted">' + (prescription.patient_id ? 'ID: ' + prescription.patient_id : '') + '</div>' +
                    '</div>' +
                '</div>' +
            '</td>' +
            '<td>' + formatDate(prescription.created_at) + '</td>' +
            '<td>' +
                '<span class="badge bg-' + getStatusBadgeClass(prescription.status) + '">' +
                    getStatusText(prescription.status) +
                '</span>' +
            '</td>' +
            '<td>' + formatCurrency(prescription.total_amount || 0) + '</td>' +
            '<td>' +
                '<div class="d-flex gap-2">' +
                    '<button class="btn btn-sm btn-primary" onclick="viewPrescription(' + (prescription.id || 0) + ')">' +
                        '<i class="bi bi-eye"></i>' +
                    '</button>' +
                    (prescription.status !== 'completed' ? 
                    '<button class="btn btn-sm btn-success" onclick="completePrescription(' + (prescription.id || 0) + ')">' +
                        '<i class="bi bi-check-lg"></i>' +
                    '</button>' : '') +
                    '<button class="btn btn-sm btn-secondary" onclick="printPrescription(' + (prescription.id || 0) + ')">' +
                        '<i class="bi bi-printer"></i>' +
                    '</button>' +
                '</div>' +
            '</td>' +
        '</tr>';
    });
    
    tableBody.innerHTML = html;
}

// Helper functions for prescriptions
function getStatusBadgeClass(status) {
    switch(status) {
        case 'pending': return 'warning';
        case 'processing': return 'primary';
        case 'completed': return 'success';
        case 'canceled': return 'danger';
        default: return 'secondary';
    }
}

function getStatusText(status) {
    switch(status) {
        case 'pending': return 'Chờ xác nhận';
        case 'processing': return 'Đang xử lý';
        case 'completed': return 'Đã hoàn thành';
        case 'canceled': return 'Đã hủy';
        default: return status;
    }
}

function formatDate(dateString) {
    if (!dateString) return '-';
    const date = new Date(dateString);
    return date.toLocaleDateString('vi-VN');
}

function formatCurrency(amount) {
    return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(amount);
}

// Function to filter appointments
function filterAppointments(status) {
    const rows = document.querySelectorAll('#appointments-table tbody tr');
    
    rows.forEach(row => {
        if (status === 'all' || row.dataset.status === status) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

// Complete prescription process
function completePrescription(prescriptionId) {
    if (confirm('Bạn có chắc chắn muốn hoàn thành đơn thuốc này?')) {
        // Send request to complete prescription
        fetch('../../controllers/prescriptions/update_status.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'id=' + prescriptionId + '&status=completed'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Đơn thuốc đã được hoàn thành!');
                // Close the modal if open
                const modal = bootstrap.Modal.getInstance(document.getElementById('viewPrescriptionModal'));
                if (modal) {
                    modal.hide();
                }
                // Reload prescriptions list
                loadPrescriptions();
            } else {
                alert('Có lỗi xảy ra: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra khi cập nhật trạng thái đơn thuốc!');
        });
    }
}

// Placeholder functions for prescription actions
function viewPrescription(id) {
    alert('Xem đơn thuốc ID: ' + id + '\nChức năng đang được phát triển.');
}

function printPrescription(id) {
    alert('In đơn thuốc ID: ' + id + '\nChức năng đang được phát triển.');
}

// Appointment actions
function viewAppointment(id) {
    alert('Xem lịch hẹn ID: ' + id + '\nChức năng đang được phát triển.');
}

function updateAppointmentStatus(id, status) {
    alert('Cập nhật trạng thái lịch hẹn ID: ' + id + ' sang ' + status + '\nChức năng đang được phát triển.');
}

function showAddAppointment() {
    alert('Chức năng thêm lịch hẹn đang được phát triển.');
}

// Setup profile editing
function setupProfileEditing() {
    document.getElementById('edit-profile-btn')?.addEventListener('click', function() {
        document.getElementById('profile-view-mode').classList.add('d-none');
        document.getElementById('profile-edit-mode').classList.remove('d-none');
        document.querySelector('.avatar-edit')?.classList.remove('d-none');
        this.classList.add('d-none');
    });

    document.getElementById('cancel-edit-btn')?.addEventListener('click', function() {
        document.getElementById('profile-view-mode').classList.remove('d-none');
        document.getElementById('profile-edit-mode').classList.add('d-none');
        document.querySelector('.avatar-edit')?.classList.add('d-none');
        document.getElementById('edit-profile-btn').classList.remove('d-none');
    });
}

// Logout function
function logout() {
    if (confirm('Bạn có chắc chắn muốn đăng xuất?')) {
        window.location.href = '../../controllers/auth/logout.php';
    }
}

// Function to show new prescription form
function showNewPrescriptionForm() {
    // Create modal for selecting a patient from completed appointments
    const modal = document.createElement('div');
    modal.className = 'modal fade';
    modal.id = 'newPrescriptionModal';
    modal.innerHTML = `
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tạo đơn thuốc mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <h6 class="mb-3">Chọn bệnh nhân đã khám</h6>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle" id="completed-appointments-table">
                                <thead>
                                    <tr>
                                        <th>Bệnh nhân</th>
                                        <th>Ngày khám</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="3" class="text-center py-3">Đang tải danh sách bệnh nhân...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    // Show modal
    const modalInstance = new bootstrap.Modal(modal);
    modalInstance.show();
    
    // Load completed appointments from appointments table
    fetch('http://localhost:8080/doctorHub/app/controllers/prescriptions/get_patients_for_prescription.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#completed-appointments-table tbody');
            
            if (data.length > 0) {
                let tableContent = '';
                data.forEach(app => {
                    // Lấy tên bệnh nhân từ patient_name hoặc patient_user_name
                    const patientName = app.patient_name || app.patient_user_name || 'Không có tên';
                    const date = new Date(app.appointment_date);
                    const formattedDate = date.toLocaleDateString('vi-VN') + ' ' + date.toLocaleTimeString('vi-VN', { hour: '2-digit', minute: '2-digit' });
                    
                    tableContent += `
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="../../assets/images/avatar1.jpg" alt="Avatar" class="rounded-circle me-2" width="32" height="32">
                                    <div>
                                        <div class="fw-medium">${patientName}</div>
                                        <div class="small text-muted">Mã cuộc hẹn: #${app.id}</div>
                                    </div>
                                </div>
                            </td>
                            <td>${formattedDate}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" onclick="createPrescription(${app.id}, '${patientName}', ${app.patient_id || 'null'})">
                                    <i class="bi bi-file-earmark-medical me-1"></i> Tạo đơn thuốc
                                </button>
                            </td>
                        </tr>
                    `;
                });
                tableBody.innerHTML = tableContent;
            } else {
                tableBody.innerHTML = '<tr><td colspan="3" class="text-center py-3">Không có bệnh nhân nào đã hoàn thành khám</td></tr>';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.querySelector('#completed-appointments-table tbody').innerHTML = 
                '<tr><td colspan="3" class="text-center py-3">Đã xảy ra lỗi khi tải danh sách bệnh nhân</td></tr>';
        });
    
    // Remove modal when hidden
    modal.addEventListener('hidden.bs.modal', function () {
        document.body.removeChild(modal);
    });
}

// Create a new prescription for a patient
function createPrescription(appointmentId, patientName, patientId) {
    // Close the previous modal
    const previousModal = bootstrap.Modal.getInstance(document.getElementById('newPrescriptionModal'));
    if (previousModal) {
        previousModal.hide();
    }
    
    // Create prescription form modal
    const modal = document.createElement('div');
    modal.className = 'modal fade';
    modal.id = 'prescriptionFormModal';
    modal.innerHTML = `
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Đơn thuốc cho bệnh nhân: ${patientName}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="prescriptionForm">
                        <input type="hidden" name="appointment_id" value="${appointmentId}">
                        <input type="hidden" name="patient_name" value="${patientName}">
                        <input type="hidden" name="patient_id" value="${patientId || ''}">
                        
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <label for="diagnosis" class="form-label">Chẩn đoán</label>
                                <textarea class="form-control" id="diagnosis" name="diagnosis" rows="2" required></textarea>
                            </div>
                        </div>
                        
                        <h6 class="mb-3">Danh sách thuốc</h6>
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered" id="medication-list">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 30%">Thuốc</th>
                                        <th style="width: 15%">Liều dùng</th>
                                        <th style="width: 10%">Số lượng</th>
                                        <th style="width: 10%">Số ngày</th>
                                        <th style="width: 10%">Số lần/ngày</th>
                                        <th style="width: 15%">Cách dùng</th>
                                        <th style="width: 5%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="no-medications">
                                        <td colspan="7" class="text-center py-3">Chưa có thuốc nào được thêm vào đơn</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <button type="button" class="btn btn-sm btn-success" onclick="showAddMedicationForm()">
                                                <i class="bi bi-plus-circle me-1"></i> Thêm thuốc
                                            </button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="instructions" class="form-label">Hướng dẫn tổng quát</label>
                                <textarea class="form-control" id="instructions" name="instructions" rows="2"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" onclick="savePrescription()">Lưu đơn thuốc</button>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    // Show modal
    const modalInstance = new bootstrap.Modal(modal);
    modalInstance.show();
    
    // Remove modal when hidden
    modal.addEventListener('hidden.bs.modal', function () {
        document.body.removeChild(modal);
    });
}

// Show form to add a medication to prescription
function showAddMedicationForm() {
    // Create modal for adding medication
    const modal = document.createElement('div');
    modal.className = 'modal fade';
    modal.id = 'addMedicationModal';
    modal.innerHTML = `
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm thuốc</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="medicationForm">
                        <div class="mb-3">
                            <label for="medication" class="form-label">Chọn thuốc</label>
                            <select class="form-select" id="medication" name="medication" required>
                                <option value="">-- Chọn thuốc --</option>
                                <!-- Sẽ được điền bằng fetch từ API -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="dosage" class="form-label">Liều dùng</label>
                            <input type="text" class="form-control" id="dosage" name="dosage" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Số lượng</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="days" class="form-label">Số ngày</label>
                                <input type="number" class="form-control" id="days" name="days" min="1" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="times_per_day" class="form-label">Số lần/ngày</label>
                                <input type="number" class="form-control" id="times_per_day" name="times_per_day" min="1" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="med_instructions" class="form-label">Cách dùng</label>
                            <textarea class="form-control" id="med_instructions" name="med_instructions" rows="2"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" onclick="addMedicationToPrescription()">Thêm thuốc</button>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    
    // Show modal
    const modalInstance = new bootstrap.Modal(modal);
    modalInstance.show();
    
    // Fetch medications from API
    fetch('../../controllers/prescriptions/get_medications.php')
        .then(response => response.json())
        .then(data => {
            const select = document.getElementById('medication');
            if (data.length > 0) {
                data.forEach(med => {
                    const option = document.createElement('option');
                    option.value = med.id;
                    option.textContent = `${med.name} (${med.dosage})`;
                    option.dataset.dosage = med.dosage;
                    select.appendChild(option);
                });
            } else {
                // Nếu chưa có API, tạm thời dùng dữ liệu mẫu
                const sampleMeds = [
                    { id: 1, name: 'Paracetamol', dosage: '500mg' },
                    { id: 2, name: 'Amoxicillin', dosage: '500mg' },
                    { id: 3, name: 'Omeprazole', dosage: '20mg' }
                ];
                
                sampleMeds.forEach(med => {
                    const option = document.createElement('option');
                    option.value = med.id;
                    option.textContent = `${med.name} (${med.dosage})`;
                    option.dataset.dosage = med.dosage;
                    select.appendChild(option);
                });
            }
            
            // Update dosage field when medication is selected
            select.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                if (selectedOption.value) {
                    document.getElementById('dosage').value = selectedOption.dataset.dosage;
                } else {
                    document.getElementById('dosage').value = '';
                }
            });
        })
        .catch(error => {
            console.error('Error loading medications:', error);
            // Thêm dữ liệu mẫu trong trường hợp lỗi
            const select = document.getElementById('medication');
            const sampleMeds = [
                { id: 1, name: 'Paracetamol', dosage: '500mg' },
                { id: 2, name: 'Amoxicillin', dosage: '500mg' },
                { id: 3, name: 'Omeprazole', dosage: '20mg' }
            ];
            
            sampleMeds.forEach(med => {
                const option = document.createElement('option');
                option.value = med.id;
                option.textContent = `${med.name} (${med.dosage})`;
                option.dataset.dosage = med.dosage;
                select.appendChild(option);
            });
            
            select.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                if (selectedOption.value) {
                    document.getElementById('dosage').value = selectedOption.dataset.dosage;
                } else {
                    document.getElementById('dosage').value = '';
                }
            });
        });
    
    // Remove modal when hidden
    modal.addEventListener('hidden.bs.modal', function () {
        document.body.removeChild(modal);
    });
}

// Hàm thêm thuốc vào đơn
function addMedicationToPrescription() {
    const form = document.getElementById('medicationForm');
    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }
    
    const medicationSelect = document.getElementById('medication');
    const selectedOption = medicationSelect.options[medicationSelect.selectedIndex];
    
    const medication = {
        medication_id: medicationSelect.value,
        medication_name: selectedOption.textContent,
        dosage: document.getElementById('dosage').value,
        quantity: document.getElementById('quantity').value,
        days: document.getElementById('days').value,
        times_per_day: document.getElementById('times_per_day').value,
        instructions: document.getElementById('med_instructions').value
    };
    
    // Xóa hàng "Không có thuốc"
    const noMedicationsRow = document.getElementById('no-medications');
    if (noMedicationsRow) {
        noMedicationsRow.remove();
    }
    
    // Thêm thuốc vào bảng
    const tableBody = document.querySelector('#medication-list tbody');
    const row = document.createElement('tr');
    row.dataset.medicationId = medication.medication_id;
    
    row.innerHTML = `
        <td>${medication.medication_name}</td>
        <td>${medication.dosage}</td>
        <td>${medication.quantity}</td>
        <td>${medication.days}</td>
        <td>${medication.times_per_day}</td>
        <td>${medication.instructions}</td>
        <td>
            <button type="button" class="btn btn-sm btn-danger" onclick="this.closest('tr').remove();">
                <i class="bi bi-trash"></i>
            </button>
        </td>
    `;
    
    tableBody.appendChild(row);
    
    // Đóng modal
    const modal = bootstrap.Modal.getInstance(document.getElementById('addMedicationModal'));
    modal.hide();
}

// Hàm lưu đơn thuốc
function savePrescription() {
    // Kiểm tra nếu đơn không có thuốc
    const medications = document.querySelectorAll('#medication-list tbody tr:not(#no-medications)');
    if (medications.length === 0) {
        alert('Vui lòng thêm ít nhất một loại thuốc vào đơn');
        return;
    }
    
    // Kiểm tra chẩn đoán
    const diagnosis = document.getElementById('diagnosis').value.trim();
    if (!diagnosis) {
        alert('Vui lòng nhập chẩn đoán');
        return;
    }
    
    // Thu thập dữ liệu từ form
    const prescriptionData = {
        appointment_id: document.querySelector('#prescriptionForm [name="appointment_id"]').value,
        patient_name: document.querySelector('#prescriptionForm [name="patient_name"]').value,
        patient_id: document.querySelector('#prescriptionForm [name="patient_id"]').value,
        diagnosis: diagnosis,
        instructions: document.getElementById('instructions').value,
        medications: []
    };
    
    // Thu thập dữ liệu về thuốc
    medications.forEach(row => {
        const cells = row.cells;
        
        prescriptionData.medications.push({
            medication_id: row.dataset.medicationId,
            quantity: parseInt(cells[2].textContent),
            days: parseInt(cells[3].textContent),
            times_per_day: parseInt(cells[4].textContent),
            instructions: cells[5].textContent
        });
    });
    
    // Gửi dữ liệu đến server
    fetch('../../controllers/prescriptions/save_prescription.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(prescriptionData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Đơn thuốc đã được lưu thành công!');
            
            // Đóng modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('prescriptionFormModal'));
            if (modal) {
                modal.hide();
            }
            
            // Tải lại danh sách đơn thuốc
            loadPrescriptions();
        } else {
            alert('Có lỗi xảy ra: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra khi lưu đơn thuốc!');
    });
} 