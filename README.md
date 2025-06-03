# Contact Manager CRM v1

A simple, single-page Contact Manager (mini-CRM) built with **PHP**, **MySQL**, **Bootstrap 5**, **jQuery**, and **AJAX**. Designed for freelancers or small teams to manage client leads effectively.

## 🔧 Features

- Add, edit, delete contacts via modals
- Search contacts by name or notes (AJAX-based)
- CSV export of contact list
- Responsive UI with Bootstrap 5
- Minimal setup, fully functional from a single page
- Uses MySQL for data storage

## 📁 Project Structure

📁 project-root/
├── index.php # Main UI with AJAX logic
├── db.php # Database connection
├── fetch.php # Fetch and search contacts
├── add.php # Add new contact
├── edit.php # Update existing contact
├── delete.php # Delete contact
├── export.php # Export contacts to CSV
└── README.md # This file

sql
Copy
Edit

## 🧑‍💻 Technologies Used

- PHP (Server-side)
- MySQL (Database)
- Bootstrap 5 (Frontend framework)
- jQuery + AJAX (Client-side interactivity)

## 📦 Installation

1. **Clone or Download** this repository
2. **Create Database** in MySQL:
    ```sql
    CREATE DATABASE contact_manager;
    USE contact_manager;

    CREATE TABLE contacts (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255),
      phone VARCHAR(50),
      email VARCHAR(100),
      notes TEXT
    );
    ```
3. **Configure DB Connection:**
   Edit `db.php` if your DB credentials differ:
   ```php
   $host = 'localhost';
   $db = 'contact_manager';
   $user = 'root';
   $pass = '';
Run in Browser:
Open index.php in your browser via a local server (e.g. XAMPP, WAMP, or MAMP)

💡 Usage
Click "Add Contact" to open the modal and enter details.

Use the search bar to filter by name or notes in real time.

Click "Edit" or "Delete" to manage individual entries.

Click "Export CSV" to download a backup of your contact list.

🚀 Future Improvements (Planned in v2)
Tags and Status fields

Follow-up reminders

Activity logs per contact

User login/multi-user access

Import contacts via CSV

UI enhancements and analytics dashboard

📜 License
This project is open-source and free to use under the MIT License.

Developed by: Ankit Agrawal
Location: Jaipur, India
