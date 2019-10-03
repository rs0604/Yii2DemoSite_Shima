# -*- mode: ruby -*-
# vi: set ft=ruby :

# 初回起動時のみ、下記をtrueに。
RSYNC_ENABLED = true

Vagrant.configure("2") do |config|
  config.vm.box = "geerlingguy/centos7"

  # 勝手にkernel-headersが更新されないように
  config.vbguest.auto_update = false

  shareDirectory = "/vagrant/"
  # server setting
  config.vm.provider :virtualbox do |vb|
    vb.name = "yii2demo"
    vb.memory = 1024
    vb.cpus = 1
  end

  config.vm.hostname = "yii2demo"
  config.vm.network "private_network", ip: "192.168.33.111"


  if RSYNC_ENABLED then
    config.vm.synced_folder ".", "/vagrant", type: "rsync"
  end

  # at first make directory for ansible
  config.vm.provision "makedir", type: :shell, inline: <<~"EOM"
    sudo mkdir /vagrant/provision/roles -p
    sudo chmod o+w /vagrant/provision/roles
  EOM

  # ansible-galaxy : https://stackoverflow.com/questions/46045192/how-to-automatically-install-ansible-galaxy-roles-using-vagrant
  config.vm.provision "ansible_local" do |ansible|
    ansible.galaxy_role_file = shareDirectory + "requirements.yml"
    ansible.galaxy_roles_path = shareDirectory + "provision/roles/"
    ansible.inventory_path =  shareDirectory + "provision/inventory"
    ansible.playbook = shareDirectory + "provision/playbook.yml"
    ansible.galaxy_command = 'ansible-galaxy install --role-file=%{role_file} --roles-path=%{roles_path}'
    ansible.compatibility_mode = "2.0"
    ansible.become = true
    ansible.limit = "all"
  end
end
