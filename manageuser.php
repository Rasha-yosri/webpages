



<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

// إجراء الإتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الإتصال
if ($conn->connect_error) {
    die("فشل الإتصال: " . $conn->connect_error);
}

// لتخزين البيانات بالجدول sql بناء
$sql = "INSERT INTO employees (name, email) VALUES ('Ali', 'ali@3alampro.com')";

// تنفيذ الإستعلام
if ($conn->query($sql) === TRUE) {
    echo "تم اضافة سجل البيانات بنجاح";
} else {
    echo "خطأ: " . $sql . "<br>" . $conn->error;
}

// إغلاق الإتصال
$conn->close();



