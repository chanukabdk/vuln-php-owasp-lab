# Vulnerable PHP OWASP Top 10 Lab

This project is a deliberately vulnerable PHP web application designed to demonstrate and study OWASP Top 10 (2021) web application security risks in a realistic Docker-based environment.

The application is built using raw PHP (no frameworks) to expose how insecure
design and coding practices lead to real-world vulnerabilities.

⚠️ **Warning**: This application is intentionally insecure. Do not deploy in production.

## Features
- Raw PHP implementation
- OWASP Top 10 vulnerability coverage
- Dockerized Nginx + PHP-FPM + MySQL
- Educational security lab

## Technology Stack

- Nginx (Reverse Proxy & Static Server)
- PHP-FPM (Raw PHP execution)
- MySQL 8.0 (Backend database)
- Docker & Docker Compose

## Architecture Overview

The application uses a containerized three-tier architecture:

- Nginx handles HTTP requests and forwards PHP files to PHP-FPM
- PHP-FPM executes PHP scripts
- PHP connects to MySQL using Docker internal networking
- Database data is persisted using Docker named volumes

## Docker Networking

All services run inside a private Docker network.

- PHP connects to MySQL using the hostname `db`
- Nginx connects to PHP using the hostname `php`
- The database is not exposed to the host machine


## Planned Vulnerabilities (OWASP Top 10)

- SQL Injection
- Broken Authentication
- Sensitive Data Exposure
- File Upload Vulnerabilities
- Cross-Site Scripting (XSS)
- Insecure Direct Object References (IDOR)
- Security Misconfiguration

## Intended Audience

- Cybersecurity students
- Penetration testers
- Web security learners
- Developers learning secure coding by contrast

## Disclaimer
This project is for educational purposes only.

