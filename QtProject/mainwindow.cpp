#include "mainwindow.h"
#include "ui_mainwindow.h"

MainWindow::MainWindow(QWidget *parent) :
    QMainWindow(parent),
    ui(new Ui::MainWindow)
{
    ui->setupUi(this);

    timer = new QTimer(this);

    // setup signal and slot
    connect(timer, SIGNAL(timeout()),this, SLOT(MyTimerSlot()));

    // msec
    timer->start(1000);
}

MainWindow::~MainWindow()
{
    delete ui;
}

void MainWindow::on_pushButton_clicked()
{
}

void MainWindow::MyTimerSlot()
{
    QString filename = "/var/www/html/etiquetas/state.txt";

    QFile file(filename);
    if (file.open(QIODevice::ReadWrite)) {
        QTextStream in(&file);

        while(!in.atEnd()) {
            QString line = in.readLine();
            if(line=="1")
            {
                QProcess process;
                process.startDetached("/bin/sh", QStringList()<< "/var/www/html/etiquetas/print.sh");
                QTextStream stream(&file);
                stream.seek(0);
                stream << "0" << endl;
                ui->lineEdit->setText("1");
            }
            else
            {
                qDebug() << "0";
                ui->lineEdit->setText("0");
            }
        }


    }

    file.close();
    //qDebug() << "Slot";

}
