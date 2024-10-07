import mysql.connector
from mysql.connector import Error
from datetime import datetime, timedelta

# Define the cities and start date
departure_city = "Jamnagar"
arrival_cities = ["Delhi", "Ahmedabad", "Mumbai", "Bengaluru", "Chennai"]
start_date = datetime(2024, 10, 23)  # Start from 23rd October
end_date = datetime(2024, 11, 3)  # End on 3rd November

# Function to generate INSERT queries
def generate_flight_inserts(departure_city, arrival_cities, start_date, end_date):
    query_list = []
    current_date = start_date
    
    while current_date <= end_date:
        for arrival_city in arrival_cities:
            for i in range(1, 5):  # Four flights per day
                flight_number = f"JN{i:02d}{current_date.day}{arrival_city[:2].upper()}"
                departure_time = (current_date + timedelta(hours=i + 6)).strftime('%Y-%m-%d %H:%M:%S')
                arrival_time = (current_date + timedelta(hours=i + 8)).strftime('%Y-%m-%d %H:%M:%S')
                price = 4000 + (i * 500)  # Price variation
                query = f"INSERT INTO Flights (flight_number, airline, departure_airport, arrival_airport, departure_time, arrival_time, total_seats, available_seats, price) " \
                        f"VALUES ('{flight_number}', 'Air India', '{departure_city}', '{arrival_city}', '{departure_time}', '{arrival_time}', 180, 180, {price});"
                query_list.append(query)
                
                # Generate return flight for the same day
                flight_number_return = f"{arrival_city[:2].upper()}{current_date.day}JN{i:02d}"
                departure_time_return = (current_date + timedelta(hours=i + 9)).strftime('%Y-%m-%d %H:%M:%S')
                arrival_time_return = (current_date + timedelta(hours=i + 11)).strftime('%Y-%m-%d %H:%M:%S')
                price_return = 4500 + (i * 600)
                query_return = f"INSERT INTO Flights (flight_number, airline, departure_airport, arrival_airport, departure_time, arrival_time, total_seats, available_seats, price) " \
                               f"VALUES ('{flight_number_return}', 'Air India', '{arrival_city}', '{departure_city}', '{departure_time_return}', '{arrival_time_return}', 180, 180, {price_return});"
                query_list.append(query_return)
        
        current_date += timedelta(days=1)
    
    return query_list

# Function to connect to the MySQL database
def connect_to_database(host, user, password, database):
    try:
        # Establish a database connection
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

# Function to execute queries
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
host = 'localhost'  # or your server IP
user = 'root'
password = ''
database = 'flight_booking'

# Connect to the database
connection = connect_to_database(host, user, password, database)

# Check if connection is established and run queries
if connection:
    queries = generate_flight_inserts(departure_city, arrival_cities, start_date, end_date)
    execute_queries(connection, queries)
    connection.close()  # Close the connection after executing the queries
