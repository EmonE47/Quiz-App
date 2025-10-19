# Quiz Management System

A full-stack web application built with Laravel that streamlines and enhances the process of creating, administering, and taking quizzes in academic or training contexts.

## Table of Contents
- [Overview](#overview)
- [Objectives](#objectives)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Usage](#usage)
- [System Architecture](#system-architecture)
- [Development](#development)
- [Project Management](#project-management)
- [Contributors](#contributors)
- [Branch Strategy](#branch-strategy)
- [Future Enhancements](#future-enhancements)
- [Contributing](#contributing)
- [Acknowledgments](#acknowledgments)

## Overview

The Quiz Management System is a comprehensive web application designed to replace traditional paper-based exams with a dynamic digital platform. It provides intuitive dashboards for both teachers and students, facilitating efficient exam management and test-taking experiences.

## Objectives

- **Centralize and Digitize Assessment Process**: Replace traditional paper-based exams with a dynamic web application
- **Facilitate Role-Specific Workflows**: Intuitive dashboards for Teachers (exam management) and Students (test-taking)
- **Ensure Data Security and Integrity**: Robust authentication and authorization system
- **Automate Critical Operations**: Instant automatic grading with immediate feedback
- **Responsive User Experience**: Consistent experience across all devices using Bootstrap
- **Scalable and Maintainable Codebase**: Well-structured, modular application using Laravel framework

## Features

### For Teachers
- Create and manage question papers
- Add multiple-choice questions with options
- Set exam duration, total marks, and scheduling
- View student scoreboards and performance analytics
- Manage entire exam lifecycle
- Real-time exam scheduling capabilities

### For Students
- Browse available quizzes
- Enroll in exams
- Take timed assessments
- View immediate results with scores and percentages
- Access performance history
- Interactive dashboard for exam management

## Technologies Used

- **Backend**: Laravel 12 with PHP
- **Frontend**: Bootstrap, Blade Templates, Tailwind CSS
- **Database**: MySQL with Eloquent ORM
- **Authentication**: Laravel built-in Auth with RBAC
- **Version Control**: Git with Feature-Branch workflow
- **Project Management**: Jira with Agile-Scrum methodology

## Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and npm
- MySQL 5.7+ or MariaDB
- Web server (Apache/Nginx)

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/EmonE47/Quiz-App.git
   cd Quiz-App
   ```

2. **Install PHP dependencies**:
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**:
   ```bash
   npm install
   ```

4. **Configure environment**:
   ```bash
   cp .env.example .env
   ```

5. **Update .env with your database credentials**:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=quiz_App
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

6. **Generate application key**:
   ```bash
   php artisan key:generate
   ```

7. **Run database migrations**:
   ```bash
   php artisan migrate
   ```

8. **Seed with sample data (Optional)**:
   ```bash
   php artisan db:seed
   ```

9. **Build frontend assets**:
   ```bash
   npm run build
   ```

## Usage

1. **Start the development server**:
   ```bash
   php artisan serve
   ```

2. **For development with hot reload**:
   ```bash
   npm run dev
   ```

3. **Access the application** at `http://localhost:8000`

4. **User Registration & Login**:
   - Register as Teacher or Student
   - Login to access role-specific dashboards

## System Architecture

### MVC Pattern
- **Models**: User, Paper, Question, Enrollment, Result, StudentAnswer
- **Controllers**: PaperController, StudentController, QuestionController, ResultController, AuthController
- **Views**: Blade templates for all user interfaces

### Database Schema
Key tables: users, papers, questions, enrollments, student_answers, results

### Role-Based Access Control (RBAC)
- **Teachers**: Paper creation, question management, scoreboard access
- **Students**: Exam enrollment, test-taking, result viewing

### Methodologies
- **Agile-Scrum Hybrid**: Short sprints within broader epics
- **Feature-Branch Git Workflow**: Isolated development with peer review
- **Database-Centric Design**: Normalized relational schema
- **MVC Architecture**: Clean separation of concerns

## Development

### Project Structure

```
app/
├── Models/
│   ├── User.php
│   ├── Paper.php
│   ├── Question.php
│   ├── Enrollment.php
│   ├── Result.php
│   └── StudentAnswer.php
├── Controllers/
│   ├── AuthController.php
│   ├── PaperController.php
│   ├── StudentController.php
│   ├── QuestionController.php
│   └── ResultController.php
resources/views/
├── teacher/
│   ├── create-quiz.blade.php
│   └── dashboard.blade.php
├── student/
│   └── dashboard.blade.php
├── auth/
│   ├── login.blade.php
│   ├── register.blade.php
│   └── teacher-register.blade.php
├── exam/
│   ├── take.blade.php
│   └── result.blade.php
├── paper/
│   ├── index.blade.php
│   ├── show.blade.php
│   └── scoreboard.blade.php
└── questions/
    └── create.blade.php
```

### Key Features Implemented

- Real-time exam scheduling
- Automatic grading system
- Responsive design with Bootstrap and Tailwind CSS
- Secure authentication and authorization
- Automated result calculation
- Enrollment system for students
- Scoreboard for teachers

## Project Management

### Jira Integration
The project follows Agile-Scrum methodology with Jira for:
- **Sprint Planning**: 2-week sprints with defined objectives
- **Task Tracking**: User stories, bugs, and technical tasks
- **Progress Monitoring**: Burndown charts and velocity tracking
- **Backlog Management**: Prioritized feature backlog

### Development Workflow
1. **Task Creation**: User stories created in Jira with acceptance criteria
2. **Branch Creation**: Feature branches from main following naming conventions
3. **Development**: Code implementation with regular commits
4. **Code Review**: Pull request reviews by team members
5. **Testing**: Manual and automated testing
6. **Merge**: Integration into main after approval
7. **Deployment**: Staging and production deployments

## Contributors

### Core Development Team

1. **EmonE47** (Repository Owner)
   - Primary backend development
   - Real-time scheduling features
   - System architecture design

2. **sabithbinfarid**
   - Student dashboard implementation
   - UI/UX enhancements
   - Frontend development

3. **aCoderFromAnotherWorld** (MD. Abu H...)
   - Teacher dashboard features
   - Database design and optimization
   - Backend API development

### Development Roles
- **Frontend Specialists**: sabithbinfarid, EmonE47
- **Backend Specialists**: aCoderFromAnotherWorld, EmonE47
- **UI/UX Design**: sabithbinfarid, EmonE47
- **Database Architecture**: aCoderFromAnotherWorld

## Branch Strategy

### Active Development Branches

1. **`main`** (Default Branch)
   - Production-ready code
   - Stable releases
   - Protected branch requiring pull requests

2. **`Emon/Real_Time_Scheduling`**
   - Real-time exam scheduling functionality
   - Timer implementations
   - Live updates for exam status

3. **`Emon_UI/UX_Enhancement`**
   - User interface improvements
   - Responsive design enhancements
   - User experience optimization

4. **`UI/UX_Sabith`**
   - Student-focused UI improvements
   - Dashboard enhancements
   - Mobile responsiveness

5. **`feature/teacher-dashboard`**
   - Teacher management interface
   - Exam creation workflows
   - Student performance analytics

6. **`sabith/student_dashboard`**
   - Student portal development
   - Exam enrollment system
   - Result viewing interface

7. **`soykot/teacher-dashboard`**
   - Alternative teacher dashboard implementation
   - Additional teacher features
   - Admin functionalities

8. **`flashpoint`**
   - Experimental features
   - Rapid prototyping
   - Proof-of-concept implementations

### Branch Naming Convention
- **Feature branches**: `feature/feature-name`
- **Developer branches**: `developer-name/feature-description`
- **UI/UX branches**: `UI/UX-feature-description`
- **Hotfix branches**: `hotfix/issue-description`

## Repository Statistics

- **Total Commits**: 91 commits
- **Branches**: 8 active branches
- **Contributors**: 3 developers
- **Recent Activity**: Active development with merges in the last 42 minutes
- **Pull Requests**: 22+ pull requests managed

## Development Progress

### Completed Features
- ✅ Initial Laravel project setup
- ✅ Basic authentication system
- ✅ Teacher and student role management
- ✅ Question paper creation
- ✅ Multiple-choice question system
- ✅ Exam enrollment functionality
- ✅ Automatic grading system
- ✅ Basic dashboards for both roles

### In Progress
- 🔄 Real-time scheduling enhancements
- 🔄 UI/UX improvements for both dashboards
- 🔄 Advanced analytics and reporting
- 🔄 Performance optimizations

## Future Enhancements

### Short-term Goals
- Support for diverse question types (essays, short answers)
- Enhanced real-time notifications
- Improved mobile responsiveness
- Advanced result analytics

### Long-term Vision
- Real-time notifications with WebSockets
- Advanced analytics and reporting dashboards
- Enhanced security measures (rate limiting, CAPTCHA)
- Integration with modern JavaScript frameworks (Vue.js/React)
- API development for mobile applications
- Bulk question import/export functionality
- AI-powered question recommendations

## Contributing

### Development Process
1. **Fork the repository**
2. **Create a feature branch**: `git checkout -b feature/AmazingFeature`
3. **Follow coding standards**: PSR-12 for PHP, consistent naming conventions
4. **Write tests**: Ensure adequate test coverage for new features
5. **Commit changes**: `git commit -m 'Add AmazingFeature'`
6. **Push to branch**: `git push origin feature/AmazingFeature`
7. **Open a Pull Request**: Include detailed description and Jira ticket reference

### Code Review Process
- All pull requests require at least one review
- Code must pass automated checks
- Features require manual testing
- Documentation updates needed for API changes

### Issue Reporting
- Use GitHub Issues for bug reports
- Include steps to reproduce, expected vs actual behavior
- Reference related Jira tickets when applicable

## Acknowledgments

- **Laravel Framework** - For providing a robust PHP foundation
- **Bootstrap & Tailwind CSS** - For responsive UI components
- **Jira** - For efficient project management and Agile workflow
- **GitHub** - For version control and collaboration features
- **Development Team** - For dedicated contributions and collaborative spirit

---

**Quiz Management System** - Streamlining digital education through efficient assessment management.  
**Repository**: github.com/EmonE47/Quiz-App  
**Status**: Active Development | Version 1.0.0 | Last Updated: Recent
