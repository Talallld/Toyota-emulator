<?php
// database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "webproject";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Handle form submission (insert)
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_GET['action'])) {
    $full_name = $_POST['full_name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $car = $_POST['car'] ?? '';
    $city = $_POST['city'] ?? '';
    $time = $_POST['time'] ?? '';
    $date = $_POST['date'] ?? '';
    $notes = $_POST['notes'] ?? '';

    // validation
    if (empty($full_name) || empty($email) || empty($phone)) {
        echo "<h3 style='color:red;'>Error: الاسم، البريد الإلكتروني، ورقم الجوال مطلوبين!</h3>";
    } else {
        $sql = "INSERT INTO test_drives 
                (full_name, phone, email, car, city, time, date, notes)
                VALUES 
                ('$full_name', '$phone', '$email', '$car', '$city', '$time', '$date', '$notes')";

        if (mysqli_query($conn, $sql)) {
            echo "<h2>تم إرسال الطلب بنجاح!</h2>";
        } else {
            echo "<h3>Error while inserting: " . mysqli_error($conn) . "</h3>";
        }
    }
}

// Show update form
if (isset($_GET['action']) && $_GET['action'] == 'update_form') {
    echo '
        <h2>تحديث بيانات تجربة القيادة</h2>
        <form action="main.php?action=update" method="POST">
            <label>أدخل رقم الـ ID للتحديث:</label>
            <input type="number" name="id" required><br><br>

            <label>الاسم الكامل الجديد:</label>
            <input type="text" name="full_name" required><br><br>

            <label>البريد الإلكتروني الجديد:</label>
            <input type="email" name="email" required><br><br>

            <input type="submit" value="تحديث">
        </form>
    ';
    exit;
}

// Execute update
if (isset($_GET['action']) && $_GET['action'] == 'update') {
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];

    $sql = "UPDATE test_drives SET full_name='$full_name', email='$email' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "<h3>تم تحديث البيانات بنجاح!</h3>";
    } else {
        echo "<h3>فشل التحديث: " . mysqli_error($conn) . "</h3>";
    }
    exit;
}

// Show all records
if (isset($_GET['action']) && $_GET['action'] == 'select') { 
    $sql = "SELECT * FROM test_drives"; 
    $result = mysqli_query($conn, $sql); 
    
    if (mysqli_num_rows($result) > 0) { 
        echo "<h2>جميع الطلبات:</h2>";
        echo "<table border='1' cellpadding='5'>";
        echo "<tr>
                <th>ID</th>
                <th>الاسم الكامل</th>
                <th>رقم الجوال</th>
                <th>البريد الإلكتروني</th>
                <th>السيارة</th>
                <th>المدينة</th>
                <th>وقت التجربة</th>
                <th>تاريخ التجربة</th>
                <th>ملاحظات</th>
              </tr>";
        
        while ($row = mysqli_fetch_assoc($result)) { 
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['full_name']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['car']}</td>
                    <td>{$row['city']}</td>
                    <td>{$row['time']}</td>
                    <td>{$row['date']}</td>
                    <td>{$row['notes']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<h3>لا توجد بيانات.</h3>";
    }
    exit;
}

// Delete form
if (isset($_GET['action']) && $_GET['action'] == 'delete_form') { 
    echo '
        <h2>حذف بيانات تجربة القيادة</h2>
        <form action="main.php?action=delete" method="POST">
            <label>أدخل رقم الـ ID للحذف:</label>
            <input type="number" name="id" required><br><br>
            <input type="submit" value="حذف">
        </form>
    ';
    exit;
}

// Execute delete
if (isset($_GET['action']) && $_GET['action'] == 'delete') { 
    $id = $_POST['id'];

    if (empty($id)) { 
        echo "<h3>خطأ: الـ ID مطلوب</h3>";
    } else {
        $sql = "DELETE FROM test_drives WHERE id=$id"; 
        $result = mysqli_query($conn, $sql); 

        if ($result) {
            if (mysqli_affected_rows($conn) > 0) {
                echo "<h3>تم حذف البيانات بنجاح</h3>";
            } else {
                echo "<h3>لا يوجد سجل بهذا الـ ID: $id</h3>";
            }
        } else {
            echo "<h3>فشل الحذف: " . mysqli_error($conn) . "</h3>";
        }
    }
    exit;
}

mysqli_close($conn);
?>
