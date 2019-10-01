# Vagrant + Ansible-Galaxy による環境構築
192.168.33.111で動作

## 事前準備
Vagrant と virtualBox のインストール
下記コマンドでVagrant用プラグインをインストールしておく
1. vagrant plugin install vagrant-vbguest
2. vagrant plugin install vagrant-rsync-back

## 手順
1. vagrant up
2. Ansibleの実行が終わったら vagrant ssh
3. cd /vagrant/site
4. sudo /usr/local/bin/composer install
5. vagrant rsync-back (ゲストOS側での変更をホストに反映)
6. vagrant halt
7. Vagrantfileを開き、説明に従い、 RSYNC_ENABLED を falseに変更
8. vagrant up
9. http://192.168.33.111 にアクセス
