import mysql.connector
from mysql.connector import Error
from datetime import datetime, timedelta

# Define the cities and date range for flights
departure_city = "Jamnagar"
arrival_cities = ["Delhi", "Ahmedabad", "Mumbai", "Bengaluru", "Chennai"]
start_date = datetime(2024, 10, 23)  # Start from 23rd October
end_date = datetime(2024, 11, 3)  # End on 3rd November

# Define specific flight durations (in hours) for each destination
flight_durations = {
    "Delhi": 2.5,
    "Ahmedabad": 1.5,
    "Mumbai": 2.0,
    "Bengaluru": 3.0,
    "Chennai": 3.5
}

# Function to calculate flight duration in seconds
def calculate_duration_in_seconds(departure_time, arrival_time):
    duration = arrival_time - departure_time
    return int(duration.total_seconds())  # Return duration in seconds

# Function to generate INSERT queries for flights
def generate_flight_inserts(departure_city, arrival_cities, start_date, end_date):
    query_list = []
    current_date = start_date
    
    while current_date <= end_date:
        for arrival_city in arrival_cities:
            for i in range(1, 5):  # Generate four flights per day
                flight_number = f"JN{i:02d}{current_date.day}{arrival_city[:2].upper()}"
                departure_time = current_date + timedelta(hours=i + 6)
                
                # Calculate arrival time using predefined durations
                duration_hours = flight_durations[arrival_city]
                arrival_time = departure_time + timedelta(hours=duration_hours)
                
                # Calculate duration in seconds
                duration = calculate_duration_in_seconds(departure_time, arrival_time)
                departure_time_str = departure_time.strftime('%Y-%m-%d %H:%M:%S')
                arrival_time_str = arrival_time.strftime('%Y-%m-%d %H:%M:%S')
                price = 4000 + (i * 500)  # Price variation
                
                # Prepare insert query for the outgoing flight
                query = (f"INSERT INTO Flights (flight_number, airline, departure_airport, arrival_airport, "
                         f"departure_time, arrival_time, duration, total_seats, available_seats, price) "
                         f"VALUES ('{flight_number}', 'Air India', '{departure_city}', '{arrival_city}', "
                         f"'{departure_time_str}', '{arrival_time_str}', {duration}, 180, 180, {price});")
                query_list.append(query)
                
                # Prepare insert query for the return flight
                flight_number_return = f"{arrival_city[:2].upper()}{current_date.day}JN{i:02d}"
                departure_time_return = current_date + timedelta(hours=i + 9)
                arrival_time_return = departure_time_return + timedelta(hours=duration_hours)
                
                # Calculate duration in seconds for return flight
                duration_return = calculate_duration_in_seconds(departure_time_return, arrival_time_return)
                departure_time_return_str = departure_time_return.strftime('%Y-%m-%d %H:%M:%S')
                arrival_time_return_str = arrival_time_return.strftime('%Y-%m-%d %H:%M:%S')
                price_return = 4500 + (i * 600)
                
                # Prepare insert query for the return flight
                query_return = (f"INSERT INTO Flights (flight_number, airline, departure_airport, arrival_airport, "
                                f"departure_time, arrival_time, duration, total_seats, available_seats, price) "
                                f"VALUES ('{flight_number_return}', 'Air India', '{arrival_city}', '{departure_city}', "
                                f"'{departure_time_return_str}', '{arrival_time_return_str}', {duration_return}, 180, 180, {price_return});")
                query_list.append(query_return)
        
        current_date += timedelta(days=1)
    
    return query_list

# Function to connect to the MySQL database
def connect_to_database(host, user, password, database):
    try:
        connection = mysql.connector.connect(
            host=host,
            user=user,
            password=password,
            database=database
        )
        if connection.is_connected():
            print("Connected to the database")
            return connection
    except Error as e:
        print(f"Error while connecting to MySQL: {e}")
        return None

# Function to execute SQL queries
def execute_queries(connection, queries):
    try:
        cursor = connection.cursor()
        for query in queries:
            cursor.execute(query)
        connection.commit()  # Commit all queries to the database
        print("Queries executed successfully")
    except Error as e:
        print(f"Failed to execute queries: {e}")
    finally:
        cursor.close()

# Define your database credentials
host = 'localhost' 
user = 'root'  
password = ''  
database = 'flight_booking'  # Database name

# Main execution
if __name__ == "__main__":
    # Connect to the database
    connection = connect_to_database(host, user, password, database)

    # Check if connection is established and run queries
    if connection:
        queries = generate_flight_inserts(departure_city, arrival_cities, start_date, end_date)
        execute_queries(connection, queries)
        connection.close()  # Close the connection after executing the queries
