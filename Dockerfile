FROM mattrayner/lamp:latest

# Puedo usar root sin pass
# ENV MYSQL_USER_NAME user
# ENV MYSQL_USER_PASS pass
ENV MYSQL_USER_DB cerveceria

COPY . /app

CMD ["/run.sh"]
