<?php $page_title = "Xác nhận đơn"; ?>
<?php
session_start();
include 'header.php';
// tim ten cua dia diem tu code
function find_location_name($city_code, $district_code, $ward_code, $data) {
    foreach ($data as $city) {
        if ($city['Id'] == $city_code) {
            $city_name = $city['Name'];
            foreach ($city['Districts'] as $district) {
                if ($district['Id'] == $district_code) {
                    $district_name = $district['Name'];
                    foreach ($district['Wards'] as $ward) {
                        if ($ward['Id'] == $ward_code) {
                            $ward_name = $ward['Name'];
                            return array(
                                'city_name' => $city_name,
                                'district_name' => $district_name,
                                'ward_name' => $ward_name)         ;
                                         }
                    }
                }
            }
        }
    }
    return null; 
}

// get data tu json
$data = json_decode(file_get_contents("https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json"), true);
//Cấu trúc: [{"Id":"01","Name":"Thành phố Hà Nội","Districts":[{"Id":"001","Name":"Quận Ba Đình","Wards":[{"Id":"00001","Name":"Phường Phúc Xá","Level":"Phường"},

$dia_chi = ''; 
if (isset($_POST['dia_chi'])) {
    $dia_chi = $_POST['dia_chi'];
}





if (isset($_POST['thanhtoan'])) {
     // check all
     if (!empty($_POST['ho_ten']) && !empty($_POST['so_dien_thoai'])  && !empty($_POST['email_khach'])&& !empty($_POST['dia_chi']) && !empty($_POST['tinh_thanh']) && !empty($_POST['quan_huyen']) && !empty($_POST['phuong_xa'])){
   
    $ho_ten = $_POST['ho_ten'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $email_khach = $_POST['email_khach'];
    $dia_chi = $_POST['dia_chi'];
    $tinh_thanh = $_POST['tinh_thanh'];
    $quan_huyen = $_POST['quan_huyen'];
    $phuong_xa = $_POST['phuong_xa'];
    
    
    $location_names = find_location_name($tinh_thanh, $quan_huyen, $phuong_xa, $data);
 
    $_SESSION['customer_info'] = array(
        'full_name' => $ho_ten,
        'phone_number' => $so_dien_thoai,
        'email_khach'=>$email_khach,
        'address' => $dia_chi,
        'city' => $location_names['city_name'],
        'district' => $location_names['district_name'],
        'ward' => $location_names['ward_name']
    );

    header('Location: confirm_cart.php');
}}


// print_r($_SESSION['customer_info']);
?>

<body>

    <!---------------------------info_customer_cart------------------------------------->
    <section class="info_customer_cart">
        <div >
            <div class="info_customer_cart-top-wrap">
                <div class="info_customer_cart-top">
                    <!-- CSS CHUNG info_customer_cart-top-item-->
                    <div class="info_customer_cart-top-info_customer_cart info_customer_cart-top-item">
                        <i class="fa-solid fa-cart-shopping "></i>
                    </div>
                    <div class="deliver-top-address info_customer_cart-top-item">
                        <i class="fa-solid fa-location-dot "></i>
                    </div>
                    <div class="info_customer_cart-top-confirm_cart info_customer_cart-top-item">
                        <i class="fa-solid fa-check"></i>
                    </div>
                </div>
            </div>
        </div>

        <div >
            <div class="info_customer_cart-content row">
                <div class="info_customer_cart-content-left">
                    <p>Vui lòng nhập địa chỉ giao hàng:<br></p>

                    <div class="info_customer_cart-content-left-input-top row">
                        <!-- form -->

                        <form method="post">
                            <div class="info_customer_cart-content-left-input-top-item">
                                <label for="ho_ten"> Họ tên <span style="color:red"> * </span> </label>
                                <input type="text" name="ho_ten" id="ho_ten"> 
                            </div>
                            <div class="info_customer_cart-content-left-input-top-item">
                                <label for="so_dien_thoai"> Điện thoại <span style="color:red"> * </span> </label>
                                <input required type="text" name="so_dien_thoai" id="so_dien_thoai" pattern="[0-9]{10}" title="Vui lòng nhập đúng 10 số điện thoại">
                             
                            </div>
                            <div class="info_customer_cart-content-left-input-top-item">
                                <label for="email_khach"> Email ( nhập chính xác, nhận thông tin đơn hàng) <span style="color:red"> * </span> </label>
                                <input required type="email" name="email_khach" id="email_khach" >
                               
                            </div>
                            <div class="info_customer_cart-content-left-input-top-item-option">
                                <label> Địa chỉ <span style="color:red"> * </span> </label>
                                <select id="city" name="tinh_thanh">
                                    <option value="" selected>Chọn tỉnh thành</option>
                                </select>
                                <select id="district" name="quan_huyen">
                                    <option value="" selected>Chọn quận huyện</option>
                                </select>
                                <select id="ward" name="phuong_xa">
                                    <option value="" selected>Chọn phường xã</option>
                                </select>
                            </div>
                            <div class="info_customer_cart-content-left-input-top-item">
                                <label for="dia_chi"> Số nhà, tên đường <span style="color:red"> * </span> </label>
                                <input required type="text" name="dia_chi" id="dia_chi">
                            </div>

                            <div class="info_customer_cart-content-left-button row ">
                                <a href="cart.php">
                                    <p style="font-size: 15px;"> <span>&#10502</span> Quay lại giỏ hàng</p>
                                </a>
                                <button type="submit" name="thanhtoan">THANH TOÁN VÀ GIAO HÀNG </button>

                            </div>

                        </form>

                    </div>

                </div>

                <div class="info_customer_cart-content-right">
                    <table>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>

                        </tr>
                        <?php
                    // print_r($_SESSION['cart']);
                    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                        $total =0;
                        foreach($_SESSION['cart'] as $item){
                            $subtotal = $item['product_price'] * $item['quantity'] ;
                            $total+=$subtotal;
                            echo'<tr>';
                            echo'<td>'.$item['product_name'].'</td>';
                            echo'<td>'.$item['quantity'].'</td>';
                            echo '<td>' . number_format($subtotal, 0, ',', '.') . 'đ</td>';
                            echo'</tr>';
                        }
                    }
                    else {
                        echo'<tr>';
                        echo'<td colspan="3">Giỏ hàng của bạn chưa có sản phẩm nào</td>';
                    }
                    
                  
                    
                    
                    echo '<tr>';
                    echo '<td style="font-weight: bold;" colspan="3">Tổng tiền hàng</td>';
                    echo '<td style="font-weight: bold; ">';
                    echo isset($total) ? number_format($total, 0, ',', '.') . 'đ' : '0đ';
                    echo '</td>';
                    echo '</tr>';
                    ?>

                    </table>
                </div>
            </div>
        </div>

    </section>

    <p>
        <hr>
    </p>

</body>
<script type="text/javascript" src="script.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var ThamSo = {
        url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(ThamSo); //lay data
    promise.then(function(result) { //xu li data
        xuLiDiaChi(result.data);
    });

    function xuLiDiaChi(data) {
        for (const c of data) {
            citis.options[citis.options.length] = new Option(c.Name, c.Id);
        }
        //get District
        citis.onchange = function() {
            district.length = 1;
            ward.length = 1;
            if (this.value != "") {
                const result = data.filter(n => n.Id === this.value);
                for (const d of result[0].Districts) {
                    district.options[district.options.length] = new Option(d.Name, d.Id);
                }
            }
        };
         //get ward
        district.onchange = function() {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.value);
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.value)[0].Wards;
                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Id);
                }
            }
        };
    }
</script>

</html>