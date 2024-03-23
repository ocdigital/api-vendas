# Use the official Node.js 14 image as a base image
FROM node:14-alpine as build-stage

# Set the working directory in the container
WORKDIR /app

# Copy package.json and package-lock.json to the working directory
COPY package*.json ./

# Install dependencies
RUN npm install

# Copy the entire project to the working directory
COPY . .

# Build the Vue.js application for production
RUN npm run build

# Use nginx as the base image for serving the Vue.js application
FROM nginx:alpine

# Copy the built Vue.js application from the build-stage image to the nginx web root directory
COPY --from=build-stage /app/dist /usr/share/nginx/html

# Expose port 80
EXPOSE 80

# Start nginx to serve the application
CMD ["nginx", "-g", "daemon off;"]
