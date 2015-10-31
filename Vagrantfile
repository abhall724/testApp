VAGRANT_API_VERSION = "2"

Vagrant.configure(VAGRANT_API_VERSION) do |config|
  config.ssh.insert_key = false
  config.vm.box = "bento/centos-6.7"

  config.vm.provision :shell, :path => "bootstrap.sh"

  config.vm.synced_folder "app/", "/var/www/html/app"

  config.ssh.forward_agent = true

  config.vm.network "private_network", ip: "192.168.0.2"
end
