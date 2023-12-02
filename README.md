# Hướng dẫn demo chức năng

---
# ADMIN
---

## CHỨC NĂNG 1: Đăng ký và đăng nhập Admin

Chú ý: Đây là demo chức năng đơn giản cho trang web, theo nghiệp vụ chuẩn không nên đăng ký Admin kiểu này

### Bước 1: Vào địa chỉ http://127.0.0.1:8000/admin/register/secret-key/validate

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/6a4f65c7-67ef-4cbc-b1c6-df4014d361b7)

### Bước 2: Nhập thông tin 

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/0ea7f670-0f22-437b-8a2b-ffb4a20e57d4)

### Bước 3: Đăng nhập ( Sau khi được chuyển hướng từ đăng ký )

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/ea51fccc-7bc0-44cc-823e-894f78341864)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/575f0ae0-8ea8-40f1-a92c-2a374620aba4)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/38b0b9e4-aae2-43a9-b195-6f691f1f879f)

## CHỨC NĂNG 2: Quản lý sản phẩm và thể loại

### Xem: Nhấn vào mục sản phẩm ở menu

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/f0cbe243-a6f7-4e5e-bf54-0fa5c0c36992)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/b41a8994-f1aa-4ab2-abf1-30992eb08fc9)

### Thêm: Nhấn vào nút 'Thêm cây mới'

- Nếu chưa thêm thể loại sản phẩm trước, sẽ có logic if else kiểm tra để chuyển hướng về trang thể loại tạo thể loại đầu tiên

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/f9057655-79ea-47fc-baa2-faad6de3eaff)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/2f72ff53-4662-4fe5-a7b3-8345395ac065)

- Nhập một thể loại mới

![ThemVaSuaTheLoai](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/14897d4c-51e0-4820-85c2-7142e58c3c5e)

- Sau khi nhập xong quay lại sản phẩm để thêm một sản phẩm mới

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/dd681681-dc19-4d4b-8649-be9f7b878a00)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/8acdd079-07c3-4c1e-89a9-891179d1dd73)

- Điền thông tin

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/7d4688ea-4ca5-4264-b574-2dd0875ea416)

- Nhấn thêm và sản phẩm đã được thêm thành công

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/6c4913e8-a647-4c71-9892-5fde5a5e6f84)

### Sửa: Nhấn vào nút sửa, điền thông tin lại và nhấn Sửa sản phẩm

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/ae4af619-0306-4b72-853e-4dcdbc1d03a4)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/10a633b9-aa07-4551-b69f-1ce2265d6cf1)

### Xem nhanh

- Ấn vào nút xem để xem nhanh chi tiết sản phẩm

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/62f5cfab-8d40-4b94-8fe8-b6e6f26dd143)

### Ngừng bán

- Thay đổi trạng thái của sản phẩm, dùng logic if else nếu sản phẩm có trạng thái 1 thì hiển thị cho khách hàng, trạng thái 0 thì không hiển thị

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/37a6fd7c-b942-4bcd-a336-5ba204056176)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/cda09b89-9484-4343-957f-885e95b6c4df)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/9c1e7cbe-ebc1-49ff-b0fe-5cbeb0e1c562)

- Bấm bán lại để hiển thị lại sản phẩm

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/05ca1be6-75ec-4d93-91c6-ca293f8ccfba)

## CHỨC NĂNG 3: Quản lý bình luận ( của sản phẩm )

- Nếu khách hàng có bình luận một sản phẩm thì các bình luận sẽ hiển thị ở đây

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/10ae4982-bdcf-427d-86ea-04d788500af3)

## Chức năng 4: Quản lý khách hàng

- Admin có thể xem thông tin khách hàng ( Ngoại trừ password theo nghiệp vụ )

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/bf2c8292-5181-44f1-a658-01f9fc1c0bf4)

## Chức năng 5: Quản lý hóa đơn

- Sau khi hóa đơn được đặt bởi khách hàng, Admin có thể xem ở mục hóa đơn

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/76e9ca7e-f675-4ea7-8a84-e78a121ad647)

- Admin có thể ấn xem để xem chi tiết hóa đơn

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/54cc266f-78cf-45e6-8374-2254942e5607)

- Ở đây Admin có thể hủy hoặc xác nhận đơn hàng
- Hủy sẽ chuyển trạng thái đơn hàng sang hủy
- Xác nhận sẽ chuyển trạng thái sản phẩm sang vận chuyển

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/ff9813de-5fba-469b-a7f3-3a9cb521016a)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/2daa6d1b-c24f-4cf5-8cab-43fcce9ec3b3)

Admin có thể ấn nút Đã vận chuyển ở ngoài trang hóa đơn để hoàn thành đơn hàng

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/0422daaf-80f8-4c55-b5e9-4b0bd4c18f47)

---
# CUSTOMER: Khách chưa có tài khoản
---

- Khách chưa có tài khoản có thể xem hàng, thêm hàng vào giỏ và đặt hàng mà không cần đăng nhập trước

## Chức năng 1: Đặt hàng

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/f594f842-a538-4ac1-a511-eaee5b630de2)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/1366d7d7-4eee-4ed0-8df9-7058a64025e1)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/b2ef5973-918e-4248-804a-5f9078f842cd)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/32519ce0-7720-4865-bbfa-2da2cf7cfeef)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/36c4ba88-d388-4be5-8786-03e376e9852d)

- Khách có thể đặt hàng với phương thức thanh toán khi nhận hàng hoặc chuyển khoản qua ví momo
- Link tài khoản test momo sẽ ở https://developers.momo.vn/v3/vi/docs/payment/onboarding/test-instructions/

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/7c8cfeb7-c02d-4c95-a4f2-9526936aedd6)

Sau khi nhấn đặt hàng ( Hoặc thanh toán thành công khi sử dụng ví momo ), sẽ thanh toán thành công và chuyển sang trang báo

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/115e0287-c11a-41de-8110-620472632323)

# Chức năng 2: Xem bình luận

- Khách vãng lai có thể xem bình luận nhưng không được bình luận trừ khi đăng nhập

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/cdf76afc-c222-479c-8758-d688d3628725)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/d6e29600-1993-4977-9fd2-f334ad8788b6)
  
---
# CUSTOMER: Khách có tài khoản
---

## Chức năng 1: Đăng ký/Đăng nhập

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/3d906133-22d0-478d-8d66-d3ee33709c2c)

Khách có thể đăng nhập hoặc đăng ký tại trang 

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/c1d9de7f-8556-4613-891e-864f18534b16)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/a5b7c977-021c-42f0-b2cb-44419dc04a39)

Sau khi đăng ký thành công sẽ chuyển về tab đăng nhập

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/a642c29f-15a6-4e64-abb3-a71eba85ffd0)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/5ee4b100-f37a-447b-a19c-ec332c7aad56)

## Chức năng 2: Đặt hàng và xem tình trạng hàng

- Tương tự như khách chưa có tài khoản, khách có tài khoản có thể đặt hàng và ngoài ra còn lưu được lịch sử hàng trong My Account ( Tài khoản của tôi )

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/570c03af-8069-4181-8c15-e16b5c92ec16)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/e02f463b-9c5c-4dd6-9499-2d416549bf6f)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/eebc0159-6782-4ae0-aab2-c13b69797c5f)

- Ở đây khách có thể xem chi tiết đơn hàng hoặc hủy đơn hàng

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/a7c084b1-76a8-4a50-8e42-ca053ad2881a)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/a6839e3a-bc55-40c9-8b6f-80de3a42f72f)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/d4b5a71d-de04-43e4-84c1-f1d09a21262a)

## Chức năng 3: Bình luận

- Khách có thể xem và bình luận

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/fcfe70ae-7719-4864-8d33-45571b7c6e4f)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/945da2ca-6172-43a6-a24b-4be48bbb49e5)

![image](https://github.com/StrikerFest/Republic-of-ReadMe/assets/72716233/2478f0cf-c736-435d-8160-65a7c0566074)
