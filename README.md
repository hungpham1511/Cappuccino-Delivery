# Cappuccino-Delivery
Đồ án nhập môn lập trình ứng dụng web, Website bán cà phê online

## Cấu trúc commit
- Message không quá 50 chữ nha mn
- Message nên là một câu mệnh lệnh nha (Giống với cách github generate commit message cho mình) example: "Implement 'Checkout'" hay "Fix forgot password button in 'Login'"
- Message nhớ viết hoa đầu câu và đừng "." ở cuối câu nha mn
- Sửa đổi, cài đặt, hay xóa, thêm nội dụng trong một file hay trong một tính năng nào đó thì nên highlight file/tính năng đó lên, như ở trên là sửa tính năng forgot password trong login thì commit message sẽ là "Fix forgot password button in 'Login'" tính năng/trang login sẽ được highlight bằng dấu '' để có kiếm commit thì dễ traceback ra
> *Lưu ý: nhớ commit thường xuyên :> chứ gom 1 cục lại mới commit thì không biết nên viết message như thế nào đâu :v*

## Ming Ngok's laravel implement tutorial 
Clone về phải làm mấy cái này mới chạy được
Sử dụng terminal hay cmd trên thư mục www
- Clone project: git clone tên_đường_dẫn_project_trên_github
- Sử dụng câu lệnh cd Tên_thu_mục đi tới thư mục chưa project mới clone về.
- Chạy câu lệnh trên terminal: composer install
- Copy file .env.example thành file .env
 + Đối với Window: copy .env.example .env
 + Đối với Ubuntu: cp .env.example .env
- Mở file .env thay đổi DB_DATABASE, DB_USERNAME, DB_PASSWORD cho phù hợp
- Chạy: php artisan key:generate
- Chạy: php artisan migrate --seed
- Chạy: php artisan serve
