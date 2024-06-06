using System;
using System.IO.Ports;
using System.Linq;
using System.Net.Http;
using System.Threading;
using System.Threading.Tasks;
using System.Windows.Forms;

using Map = System.Collections.Generic.Dictionary<string, string>;

namespace Transmissão_de_Dados
{
    public partial class Form1 : Form
    {

        private readonly SerialPort _port;
        public Form1()
        {
            InitializeComponent();

            try
            {
                //_port = InicializarConexaoArduino();    // Programação padrão - configuração automática.
                _port = new SerialPort("COM8", 9600);     // Utilize caso retorne "ACESSO NEGADO", configuração manual.
                _port.Open();
                // Handshake ("aperto de mãos") entre arduino e windows form aqui
                _port.Write(new byte[] { (byte)'A' }, 0, 1);
                // _Port.WriteTimeout = 4000; // Se passar de 4s pra ler a linha, lança uma TimeOutException
                if (!_port.ReadLine().Contains("Arduino Conectado"))
                    throw new Exception("Arduino não conectado");

                Task.Factory.StartNew(() =>
                {
                    while (true)
                        ReceiveData();

                }, TaskCreationOptions.LongRunning);

            }
            catch (Exception ex)
            {
                MessageBox.Show("Comunicação Serial" + Environment.NewLine + ex.Message, "ERRO", MessageBoxButtons.OK);
                MessageBox.Show($"Erro: {ex.GetType().Name}\nMensagem: {ex.Message}\nPilha de Chamadas: {ex.StackTrace}", "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error);

                Environment.Exit(0);
            }
        }

        private SerialPort InicializarConexaoArduino()
        {
            while (true) // Loop infinito para continuar tentando a conexão
            {
                string[] portasDisponiveis = SerialPort.GetPortNames();

                foreach (string porta in portasDisponiveis)
                {
                    try
                    {
                        SerialPort _Port = new SerialPort(porta, 9600);

                        // Tenta conectar ao Arduino
                        if (TentarConectarArduino(_Port))
                        {
                            return _Port; // Retorna a porta serial se a conexão foi bem-sucedida
                        }
                    }
                    catch (Exception ex)
                    {
                        // Trata exceções, se ocorrerem
                        MessageBox.Show($"Erro ao tentar inicializar conexão com Arduino na porta {porta}: {ex.Message}", "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error);
                        MessageBox.Show($"Erro: {ex.GetType().Name}\nMensagem: {ex.Message}\nPilha de Chamadas: {ex.StackTrace}", "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }
                }
                MessageBox.Show("Nenhuma porta encontrada. Tentando novamente em alguns segundos...");
                Thread.Sleep(2000); // Aguarda 2 segundos antes de tentar novamente
            }
        }

        private bool TentarConectarArduino(SerialPort _Port)
        {
            try
            {
                if (!_Port.IsOpen)
                    _Port.Open();

                // Handshake ("aperto de mãos") para garantir que o Arduino sincronize
                _Port.Write(new byte[] { (byte)'A' }, 0, 1);
                _Port.WriteTimeout = 4000; // Se passar de 4s pra ler a linha, lança uma TimeOutException

                // Verifica se há dados disponíveis para leitura
                if (_Port.BytesToRead != 0)
                {
                    string mensagem = _Port.ReadLine();

                    // Verifica se a mensagem é a esperada do Arduino
                    if (mensagem.Contains("Arduino Conectado"))
                    {
                        //_Port.DiscardInBuffer();
                        return true;
                    }
                }
            }
            catch (Exception ex)
            {
                // Trata exceções, se ocorrerem
                MessageBox.Show("Erro ao tentar conectar ao Arduino: " + ex.Message, "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error);
                MessageBox.Show($"Erro: {ex.GetType().Name}\nMensagem: {ex.Message}\nPilha de Chamadas: {ex.StackTrace}", "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
            return false;
        }

        private void ReceiveData()
        {
            var mensagem = _port.ReadLine().Trim();
            _port.DiscardInBuffer();
            Console.WriteLine("Data Received");

            // Divide a mensagem em termos usando '&' como delimitador
            // var termos = mensagem.Split('&');

            // chave-valor, string-string
            Map dados = new Map();
            try
            {
                dados = mensagem.Split('&').ToDictionary(
                x => x.Split('=')[0], x => x.Split('=')[1]
            );
            }
            catch (Exception ex)
            {
                MessageBox.Show("Tratamento de Dados" + Environment.NewLine + ex.Message, "ERRO", MessageBoxButtons.OK);
                return;
            }

            // foreach (var item in termos)
            // {
            //     // Divide cada termo em chave e valor usando '=' como delimitador
            //     var t = item.Split('=');

            //     // Verifica se a chave já existe no dicionário
            //     if (dados.ContainsKey(t[0]))
            //     {
            //         // A chave já existe, substitui o valor associado
            //         dados[t[0]] = t[1];
            //     }
            //     else
            //     {
            //         // A chave não existe, adiciona um novo par chave-valor ao dicionário
            //         dados.Add(t[0], t[1]);
            //     }
            // }
            // Validação de segurança: senha
            if (dados["senha_exe"] == "a4XXFt")
            {
                try
                {
                    PhpDataTransmission(dados);
                    DefinirTexto("");
                }
                catch (Exception ex)
                {
                    MessageBox.Show("Transmissão de Dados" + Environment.NewLine + ex.Message, "ERRO", MessageBoxButtons.OK);
                    MessageBox.Show($"Erro: {ex.GetType().Name}\nMensagem: {ex.Message}\nPilha de Chamadas: {ex.StackTrace}", "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }
            }
        }

        private async void PhpDataTransmission(Map dados)
        {
            try
            {
                HttpClient hc = new HttpClient();
                var requisicao = await hc.PostAsync("http://qihome.000webhostapp.com/dadosPOST.php", new FormUrlEncodedContent(dados));
                var resposta = await requisicao.Content.ReadAsStringAsync();
                DefinirTexto(resposta);
            }
            catch (Exception ex)
            {
                MessageBox.Show("Requisição" + Environment.NewLine + ex.Message, "ERRO", MessageBoxButtons.OK);
                MessageBox.Show($"Erro: {ex.GetType().Name}\nMensagem: {ex.Message}\nPilha de Chamadas: {ex.StackTrace}", "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }
        delegate void SetTextCallback(string texto);
        private void DefinirTexto(string texto)
        {
            if (mensagemtxt.InvokeRequired)
            {
                var d = new SetTextCallback(DefinirTexto);
                mensagemtxt.Invoke(d, new object[] { texto });
            }
            else
            {
                mensagemtxt.Text = texto;
            }
        }
    }
}