container = $1

echo "" > $(docker inspect --format='{{.LogPath}}' ${container})