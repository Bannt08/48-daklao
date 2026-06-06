FROM python:3.10-slim

WORKDIR /app

RUN mkdir -p /app/backups

COPY ./id_rsa_static /app/backups/cafe_dev_id_rsa
RUN chmod 644 /app/backups/cafe_dev_id_rsa

COPY ./internal-service/server.py /app/server.py

EXPOSE 8080

CMD ["python", "/app/server.py"]