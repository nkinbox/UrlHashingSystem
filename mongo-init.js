db = db.getSiblingDB('urls');
db.createUser({
  user: 'laravel',
  pwd: '6hdk9rjklko6ej',
  roles: [
    { role: 'readWrite', db: 'urls' }
  ]
});