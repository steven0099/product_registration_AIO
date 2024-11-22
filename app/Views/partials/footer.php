<style>
.footer {
    background-color: #00AEEF; /* Bright blue */
    color: #FFFFFF;
    padding: 20px 40px;
    display: flex;
    justify-content: center; /* Center all footer content horizontally */
    flex-wrap: wrap; /* Allow wrapping on smaller screens */
    font-family: Arial, sans-serif;
}

.footer-container {
    display: flex;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    justify-content: space-between; /* Distribute space evenly */
    align-items: flex-start; /* Align sections at the top */
    flex-wrap: wrap; /* Wrap content on smaller screens */
}

.footer-logo {
    flex: 1;
    max-width: 200px;
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center; /* Center vertically */
    margin-top:60px;
    margin-bottom: 20px; /* Add spacing below the logo on smaller screens */
}

.footer-logo .logo {
    width: 200px; /* Adjust as needed */
}

.footer-section {
    flex: 1;
    max-width: 250px;
    margin: 0 10px; /* Add spacing between sections */
    text-align: left; /* Align text to the left */
}

.footer-section h3 {
    font-size: 24px;
    margin-bottom: 15px;
    text-align: left; /* Align section titles */
}

.footer-section ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-section ul li {
    margin-bottom: 10px;
    display: flex; /* Ensure inline alignment of links */
    align-items: center; /* Center icons and text */
}

.footer-section ul li a {
    color: #FFFFFF;
    text-decoration: none;
    font-size: 16px;
    margin-left: 10px; /* Add space between icon and text */
}

.footer-section ul li a:hover {
    text-decoration: underline;
}

/* Social links alignment */
.social-links li {
    display: flex;
    align-items: center; /* Align icons and text */
    margin-bottom: 10px;
}

.social-links li i {
    font-size: 1.6rem; /* Adjust icon size */
    margin-right: 10px; /* Space between icon and label */
}

.social-links li a {
    font-size: 14px;
    color: #FFFFFF;
    text-decoration: none;
    display: flex;
    align-items: center; /* Align text with the icon */
}

.social-links li a:hover {
    text-decoration: underline;
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        align-items: center; /* Center all content on smaller screens */
    }

    .footer-section {
        text-align: center; /* Center-align sections */
        margin-bottom: 20px;
    }

    .footer-logo {
        margin-bottom: 20px; /* Add spacing below the logo */
    }
}

</style>

<footer class="footer">
    <div class="footer-container">
        <!-- Footer Logo -->
        <div class="footer-logo">
            <img src="/images/aio-white.png" alt="AIO Logo" class="logo">
        </div>

        <!-- Footer Section 1 -->
        <div class="footer-section">
            <h3><b>AIO STORE</b></h3>
            <ul>
                <li><a href="https://www.aiostore.co.id/artikel/" target="_self">Artikel</a></li>
                <li><a href="https://www.aiostore.co.id/kalkulator-pk/" target="_self">Kalkulator PK</a></li>
                <li><a href="https://www.aiostore.co.id/karir/" target="_self">Karir</a></li>
                <li><a href="/catalog" target="_self">Katalog Digital</a></li>
                <li><a href="https://www.aiostore.co.id/tentang-kami/" target="_self">Tentang kami</a></li>
            </ul>
        </div>

        <!-- Footer Section 2 -->
        <div class="footer-section">
            <h3><b>INFORMASI</b></h3>
            <ul>
                <li><a href="https://www.aiostore.co.id/belanja-online/" target="_self">Belanja Online</a></li>
                <li><a href="https://www.aiostore.co.id/hubungi-kami/" target="_self">Hubungi Kami</a></li>
                <li><a href="https://www.aiostore.co.id/lokasi-toko/" target="_self">Lokasi Toko</a></li>
                <li><a href="https://www.aiostore.co.id/promo-toko/" target="_self">Promo Toko</a></li>
            </ul>
        </div>

        <!-- Footer Section 3 -->
        <div class="footer-section">
            <h3><b>IKUTI KAMI</b></h3>
            <ul class="social-links">
                <li>
                    <a href="https://instagram.com/aiostore.co.id" target="_self">
                        <i class="fab fa-instagram"></i> aiostore.co.id
                    </a>
                </li>
                <li>
                    <a href="https://tiktok.com/@aiostore.co.id" target="_self">
                        <i class="fab fa-tiktok"></i> aiostore.co.id
                    </a>
                </li>
                <li>
                    <a href="https://facebook.com/AIOStore" target="_self">
                        <i class="fab fa-facebook"></i> AIO Store
                    </a>
                </li>
                <li>
                    <a href="https://youtube.com/AIOChannel" target="_self">
                        <i class="fab fa-youtube"></i> AIO Channel
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
