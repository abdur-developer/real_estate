<div class="container" data-aos="fade-up">
    <style>
        .nid_upload {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .nid_upload h2 {
            text-align: center;
        }

        .nid_upload label {
            display: block;
            margin: 15px 0 5px;
        }

        .nid_upload input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .nid_upload button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .nid_upload button:hover {
            background-color: #218838;
        }
        .verify-img{
            display: block;
            margin: 0 auto;
            height: auto;
            max-width: 70%;
        }
        @media screen and (max-width: 768px){
            .verify-img{
                max-width: 100%;
            }
        }
    </style>
    <!-- ============================================================= -->
    <img src="assets/img/verify.png" class="verify-img">
    <div class="nid_upload">
        <h2>NID আপলোড করুন</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="front_image">ফ্রন্ট ইমেজ:</label>
            <input type="file" name="front" id="front_image" required>

            <input type="hidden" name="id" value="<?=$user['id']?>">

            <label for="back_image">ব্যাক ইমেজ:</label>
            <input type="file" name="back" id="back_image" required>

            <button type="submit">আপলোড করুন</button>
        </form>
    </div>
</div>