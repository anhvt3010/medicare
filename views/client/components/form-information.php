<h5 class="datecol-12">Nhập thông tin cá nhân</h5>
<div class="col-6">
    <div class="row">
        <div class="mb-4 col-8">
            <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                    </span>
                <input type="text" class="form-control" id="patient-name" placeholder="Nhập họ và tên (*)">
            </div>
        </div>
        <div class="mb-4 col-4 text-center row">
            <div class="col-6">
                <input type="radio" id="male" name="gender" value="1"
                       style="width: 15px; height: 15px;">
                <label for="male">Nam</label>
            </div>
            <div class="col-6">
                <input type="radio" id="female" name="gender" value="0"
                       style="width: 15px; height: 15px;">
                <label for="female">Nữ</label>
            </div>
        </div>
    </div>
    <div class="mb-4">
        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-birthday-cake"></i>
                                </span>
            <input type="date" class="form-control" id="patient-dob" placeholder="Ngày sinh (*)">
        </div>
    </div>
    <div class="mb-4">
        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-phone"></i>
                                </span>
            <input type="text" class="form-control" id="patient-phone"
                   placeholder="Nhập số điện thoại chính xác để nhận OTP (*)">
        </div>
    </div>
    <div class="mb-4">
        <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa-solid fa-envelope"></i>
                                </span>
            <input type="email" class="form-control" id="patient-email"
                   placeholder="Để lại email để nhận thông tin lịch hẹn">
        </div>
    </div>
</div>
<div class="col-6">
            <textarea class="form-control" id="patient-description" rows="9" style="resize: none"
                      placeholder="Vui lòng mô tả rõ triệu chứng của bạn và nhu cầu thăm khám (*)"></textarea>
</div>
<hr>
<div class="text-center mt-3">
    <button id="submit-button" class="btn btn-success" type="button"
            style="background-color:#3fbbc0 !important; width: 20%; font-weight: bold; border: none">
        ĐẶT LỊCH
    </button>
</div>

