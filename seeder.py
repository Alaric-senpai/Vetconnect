import random
from faker import Faker
from datetime import datetime, timedelta

fake = Faker()
Faker.seed(42)

# Constants
NUM_USERS = 50
NUM_VETS = 5
NUM_PETS = 500
NUM_APPOINTMENTS = 700
NUM_MEDICAL_RECORDS = 600
NUM_PRESCRIPTIONS = 1000
NUM_INVOICES = 150

ROLES = ['client', 'admin', 'vet', 'receptionist']
SPECIES = ['Cat', 'Dog', 'Rabbit', 'Parrot']
SEXES = ['male', 'female', 'unknown']
STATUSES = ['scheduled', 'completed', 'cancelled', 'waiting']
DIAGNOSES = ['Fever', 'Ear infection', 'Wound', 'Fracture', 'No issue', 'Skin rash', 'Vomiting', 'Obesity']
TREATMENTS = ['Antibiotics', 'Surgery', 'Rest', 'Deworming', 'None needed', 'Hydration', 'Bandage', 'Diet change']
MEDICINES = ['Amoxicillin', 'Metronidazole', 'Prednisone', 'Carprofen', 'Meloxicam', 'Furosemide']

users_sql = []
vets_sql = []
pets_sql = []
appointments_sql = []
medical_sql = []
prescriptions_sql = []
invoices_sql = []

# Users and Vets
for i in range(1, NUM_USERS + 1):
    role = 'client' if i > NUM_VETS else 'vet'
    name = fake.name()
    username = fake.user_name()
    email = fake.email()
    phone = fake.phone_number()
    address = fake.address().replace("\n", ", ")
    password = '$2y$10$abcdefghijklmnopqrstuv'  # hash for 'password'
    created_at = fake.date_time_this_decade()
    users_sql.append(
        f"INSERT INTO users (id, name, username, email, phone, address, password, role, created_at) VALUES "
        f"({i}, '{name}', '{username}', '{email}', '{phone}', '{address}', '{password}', '{role}', '{created_at}');"
    )
    if role == 'vet':
        vets_sql.append(
            f"INSERT INTO vets (id, user_id, specialiization, isActive, created_at) VALUES "
            f"({i}, {i}, 'General Practice', 1, '0000-00-00 00:00:00');"
        )

# Pets
for i in range(1, NUM_PETS + 1):
    user_id = random.randint(NUM_VETS + 1, NUM_USERS)
    name = fake.first_name()
    species = random.choice(SPECIES)
    breed = fake.word().capitalize()
    age = random.randint(1, 15)
    sex = random.choice(SEXES)
    pets_sql.append(
        f"INSERT INTO pets (id, user_id, name, species, breed, age, sex, medical_notes) VALUES "
        f"({i}, {user_id}, '{name}', '{species}', '{breed}', {age}, '{sex}', NULL);"
    )

# Appointments and medical records
for i in range(1, NUM_APPOINTMENTS + 1):
    pet_id = random.randint(1, NUM_PETS)
    owner_id = random.randint(NUM_VETS + 1, NUM_USERS)
    vet_id = random.randint(1, NUM_VETS)
    appt_time = fake.date_time_between(start_date='-1y', end_date='+1y')
    reason = fake.sentence(nb_words=6)
    status = random.choice(STATUSES)
    created_at = fake.date_time_between(start_date='-1y', end_date='now')
    name = fake.catch_phrase()
    appointments_sql.append(
        f"INSERT INTO appointments (id, name, owner_id, pet_id, vet_id, appointment_time, reason, status, created_at) VALUES "
        f"({i}, '{name}', {owner_id}, {pet_id}, {vet_id}, '{appt_time}', '{reason}', '{status}', '{created_at}');"
    )

# Medical records and prescriptions
for i in range(1, NUM_MEDICAL_RECORDS + 1):
    pet_id = random.randint(1, NUM_PETS)
    vet_id = random.randint(1, NUM_VETS)
    visit_date = fake.date_between(start_date='-1y', end_date='today')
    diagnosis = random.choice(DIAGNOSES)
    treatment = random.choice(TREATMENTS)
    notes = fake.sentence(nb_words=10)
    created_at = fake.date_time_between(start_date='-1y', end_date='now')
    medical_sql.append(
        f"INSERT INTO medical_records (id, pet_id, vet_id, visit_date, diagnosis, treatment, notes, created_at) VALUES "
        f"({i}, {pet_id}, {vet_id}, '{visit_date}', '{diagnosis}', '{treatment}', '{notes}', '{created_at}');"
    )

# Prescriptions
for i in range(1, NUM_PRESCRIPTIONS + 1):
    record_id = random.randint(1, NUM_MEDICAL_RECORDS)
    med = random.choice(MEDICINES)
    dose = f"{random.randint(1, 3)}x per day"
    instructions = fake.sentence()
    prescriptions_sql.append(
        f"INSERT INTO prescriptions (id, medical_record_id, medicine_name, dosage, instructions) VALUES "
        f"({i}, {record_id}, '{med}', '{dose}', '{instructions}');"
    )

# Invoices
for i in range(1, NUM_INVOICES + 1):
    user_id = random.randint(NUM_VETS + 1, NUM_USERS)
    amount = round(random.uniform(50, 500), 2)
    status = random.choice(['paid', 'unpaid'])
    created_at = fake.date_time_between(start_date='-6mo', end_date='now')
    invoices_sql.append(
        f"INSERT INTO invoices (id, user_id, amount, status, created_at) VALUES "
        f"({i}, {user_id}, {amount}, '{status}', '{created_at}');"
    )

all_seeds = users_sql + vets_sql + pets_sql + appointments_sql + medical_sql + prescriptions_sql + invoices_sql
output_sql = "\n".join(all_seeds)
output_sql[:1000]  # Preview first 1000 chars
