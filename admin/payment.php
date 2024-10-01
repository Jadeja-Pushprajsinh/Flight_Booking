<?php
require 'db_conn.php';

// Display payment options
echo "Payment Options";
echo "<form action='book_ticket.php' method='post'>";
echo "Select Payment Method: <select name='payment_method'><option>Debit Card</option><option>Credit Card</option><option>Net Banking</option></select>";
echo "Card Number: <input type='text' name='card_number'>";
echo "Expiry Date: <input type='text' name='expiry_date'>";
echo "CVV: <input type='text' name='cvv'>";
echo "<input type='submit' value='Pay Now'>";
echo "</form>";
?>