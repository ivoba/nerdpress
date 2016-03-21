FROM node:5

# Install base packages.
RUN apt-get update && apt-get -y install \
  curl \
  nano \
  rsync \
  wget

# Clean up APT when done.
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN npm install -g gulp

WORKDIR /var/www/

CMD ["bash"]