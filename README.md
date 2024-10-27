
# Let’s Book It

**Let’s Book It** is a PHP-based flight booking system designed to simplify the booking experience by aggregating flight information from different platforms and offering a user-friendly interface. This project is ideal for travelers who want a quick, convenient, and organized way to book flights across various destinations.

## Project Overview

- **Project Name:** Let’s Book It
- **Slogan:** Let’s Book It: Your Journey, One Click Away!
- **Purpose:** A streamlined flight booking system for users to search, view, and book flights easily.
- **Technology Stack:** PHP, MySQL, JavaScript, HTML, CSS (light teal theme)

## Features

1. **User Authentication**  
   - Users can log in using their username and password.
   - Sessions persist across pages, maintaining search preferences and user information.

2. **Flight Search and Results**  
   - Search flights by origin, destination, date, and number of passengers.
   - Option to view search results on the same page or a different page.
   - Results can be sorted by the cheapest or fastest flights.

3. **Booking Process**  
   - Secure flight booking with confirmation and downloadable ticket.
   - Selectable flight class (economy, business, first) with dynamically loaded options.
   - Extra luggage support with cost calculation for additional baggage.

4. **Payment and Confirmation**  
   - Integrated payment options with display of final booking details.
   - Stylish booking confirmation page featuring a confirmation message and detailed booking information.

5. **Testimonials**  
   - Positive user reviews displayed in a card format in the testimonials section.

## Project Structure

- **index.php:** Landing page with search form, video background, and centered input.
- **login.php:** User authentication page.
- **searchresults.php:** Displays search results based on user input.
- **check_logged_in.php:** Redirects non-logged-in users to login.
- **bookflight.php:** Processes flight booking details and saves them to the database.

## Database Structure

The database contains the following tables:

1. **Flights**: Stores flight details (flight number, departure/arrival info, duration, etc.).
2. **Customers**: Stores user information for registered customers.
3. **Bookings**: Logs each booking, linking customers, flights, and class details.
4. **Classes**: Holds flight classes (e.g., economy, business).
5. **Luggage**: Manages additional luggage details and pricing.

## Getting Started

### Prerequisites

- **PHP 7.x or above**
- **MySQL**
- **Apache or any other server environment** (e.g., XAMPP, WAMP)

### Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/yourusername/lets-book-it.git
   ```
2. Import the SQL database:
   - Navigate to your MySQL dashboard and import the `lets_book_it.sql` file to set up database tables.

3. Update `config.php` with your database credentials.

4. Run the project in a local server environment.

### Usage

1. Register or log in as a user.
2. Use the search form on the homepage to find available flights.
3. Select a flight and follow the booking process.
4. Upon confirmation, download your booking details.

## Future Enhancements

- Multi-language support for a global audience.
- Additional payment gateway integration.
- Advanced filtering and sorting for flight search results.

## Contributing

Feel free to contribute by opening pull requests for bug fixes, feature additions, or documentation improvements.

## License

This project is licensed under the MIT License.

---

Enjoy your journey with *Let’s Book It*! ✈
